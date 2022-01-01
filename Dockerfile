FROM dysnomia/net-sdk-6-0 AS build-env
WORKDIR /app

ARG DRONE_BRANCH
ARG DYSNOMIA_RECAPTCHA_SECRETKEY
ARG DYSNOMIA_RECAPTCHA_SITEKEY
ARG MAIL_SERVER
ARG MAIL_ADDRESS
ARG MAIL_PASSWORD
ARG SONAR_HOST
ARG SONAR_TOKEN

# Build Project
COPY . ./

RUN jq ".RecaptchaSettings.SecretKey = \"$DYSNOMIA_RECAPTCHA_SECRETKEY\"" Dysnomia.Website.WebApp/appsettings.json > tmp.appsettings.json && mv tmp.appsettings.json Dysnomia.Website.WebApp/appsettings.json
RUN jq ".RecaptchaSettings.SiteKey = \"$DYSNOMIA_RECAPTCHA_SITEKEY\"" Dysnomia.Website.WebApp/appsettings.json > tmp.appsettings.json && mv tmp.appsettings.json Dysnomia.Website.WebApp/appsettings.json
RUN jq ".AppSettings.MailServer = \"$MAIL_SERVER\"" Dysnomia.Website.WebApp/appsettings.json > tmp.appsettings.json && mv tmp.appsettings.json Dysnomia.Website.WebApp/appsettings.json
RUN jq ".AppSettings.MailAddress = \"$MAIL_ADDRESS\"" Dysnomia.Website.WebApp/appsettings.json > tmp.appsettings.json && mv tmp.appsettings.json Dysnomia.Website.WebApp/appsettings.json
RUN jq ".AppSettings.MailPassword = \"$MAIL_PASSWORD\"" Dysnomia.Website.WebApp/appsettings.json > tmp.appsettings.json && mv tmp.appsettings.json Dysnomia.Website.WebApp/appsettings.json

RUN dotnet sonarscanner begin /k:"dysnomia" /d:sonar.host.url="$SONAR_HOST" /d:sonar.login="$SONAR_TOKEN" /d:sonar.cs.opencover.reportsPaths="**/coverage.opencover.xml" /d:sonar.coverage.exclusions="**Test*.cs" /d:sonar.branch.name="$DRONE_BRANCH"
RUN dotnet restore Dysnomia.Website.sln --ignore-failed-sources /p:EnableDefaultItems=false
RUN dotnet publish Dysnomia.Website.sln --no-restore -c Release -o out
RUN dotnet test /p:CollectCoverage=true /p:CoverletOutputFormat=opencover
RUN dotnet sonarscanner end /d:sonar.login="$SONAR_TOKEN"

# Build runtime image
FROM dysnomia/net-runtime-6-0
WORKDIR /app
COPY --from=build-env /app/out .
HEALTHCHECK --interval=2m --timeout=3s CMD curl -f http://localhost/ || exit 1
ENTRYPOINT ["dotnet", "Dysnomia.Website.WebApp.dll"]