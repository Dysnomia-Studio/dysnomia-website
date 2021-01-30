FROM dysnomia/net-sdk-5-0 AS build-env
WORKDIR /app

ARG SONAR_HOST
ARG SONAR_TOKEN

# Build Project
COPY . ./
RUN dotnet sonarscanner begin /k:"dysnomia" /d:sonar.host.url="$SONAR_HOST" /d:sonar.login="$SONAR_TOKEN" /d:sonar.cs.opencover.reportsPaths="**/coverage.opencover.xml" /d:sonar.coverage.exclusions="**Test*.cs"
RUN dotnet restore Dysnomia.Website.sln --ignore-failed-sources /p:EnableDefaultItems=false
RUN dotnet publish Dysnomia.Website.sln --no-restore -c Release -o out
RUN dotnet test /p:CollectCoverage=true /p:CoverletOutputFormat=opencover
RUN dotnet sonarscanner end /d:sonar.login="$SONAR_TOKEN"

# Build runtime image
FROM mcr.microsoft.com/dotnet/aspnet:5.0
WORKDIR /app
COPY --from=build-env /app/out .
ENTRYPOINT ["dotnet", "Dysnomia.Website.WebApp.dll"]