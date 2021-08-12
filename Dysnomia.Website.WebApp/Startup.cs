using System.Collections.Generic;
using System.Globalization;

using Dysnomia.Common.Stats;
using Dysnomia.Website.WebApp.Controllers;

using Microsoft.AspNetCore.Builder;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Localization;
using Microsoft.AspNetCore.Mvc.Razor;
using Microsoft.AspNetCore.Routing.Constraints;
using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.DependencyInjection;
using Microsoft.Extensions.Hosting;

using reCAPTCHA.AspNetCore;

namespace Dysnomia.Website.WebApp {
	public class Startup {
		public Startup(IConfiguration configuration) {
			Configuration = configuration;
		}

		public IConfiguration Configuration { get; }

		// This method gets called by the runtime. Use this method to add services to the container.
		public void ConfigureServices(IServiceCollection services) {
			var appSettingsSection = Configuration.GetSection("AppSettings");
			services.Configure<AppSettings>(appSettingsSection);

			// Captcha
			services.Configure<RecaptchaSettings>(Configuration.GetSection("RecaptchaSettings"));

			services.Configure<CookiePolicyOptions>(options => {
				// This lambda determines whether user consent for non-essential 
				// cookies is needed for a given request.
				options.CheckConsentNeeded = context => true;
				options.MinimumSameSitePolicy = SameSiteMode.Strict;
			});

			services.AddTransient<IRecaptchaService, RecaptchaService>();

			services.AddLocalization(options => options.ResourcesPath = "Translation")
				.AddMvc()
				.AddViewLocalization(LanguageViewLocationExpanderFormat.Suffix)
				.AddDataAnnotationsLocalization();
		}

		// This method gets called by the runtime. Use this method to configure the HTTP request pipeline.
		public void Configure(IApplicationBuilder app, IWebHostEnvironment env) {
			var supportedCultures = new List<CultureInfo> {
				new CultureInfo("fr"),
				new CultureInfo("fr-FR"),
				new CultureInfo("en"),
				new CultureInfo("en-US")
			};

			var localizationOptions = new RequestLocalizationOptions {
				DefaultRequestCulture = new RequestCulture("en-US"),
				SupportedCultures = supportedCultures,
				SupportedUICultures = supportedCultures
			};
			app.UseRequestLocalization(localizationOptions);
			localizationOptions.RequestCultureProviders.Insert(0, new UrlRequestCultureProvider());

			if (env.IsDevelopment()) {
				app.UseDeveloperExceptionPage();
			} else {
				app.UseExceptionHandler("/Home/Error");
				app.UseHsts();
			}

			app.UseHttpsRedirection();
			app.UseStaticFiles();
			app.UseRouting();
			app.UseCookiePolicy();

			if (!env.IsEnvironment("Testing")) {
				app.Use(async (context, next) => {
					StatsRecorder.NewVisit(context);

					await next();
				});
			}

			app.UseEndpoints(endpoints => {
				endpoints.MapControllerRoute(
					name: "cultureRoute",
					pattern: "{culture}/{controller}/{action}/{id?}",
					defaults: new { controller = "Home", action = "Index" },
					constraints: new {
						culture = new RegexRouteConstraint("^[a-z]{2}(?:-[A-Z]{2})?$")
					}
				);

				endpoints.MapControllerRoute(
					name: "defaultHome",
					pattern: "{controller=Home}/{action=Index}/{id?}");
			});
		}
	}
}
