using System.Collections.Generic;
using System.Net;
using System.Net.Http;

using Dysnomia.Website.WebApp.Controllers;

using FluentAssertions;

using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.TestHost;
using Microsoft.Extensions.Configuration;

using Xunit;

namespace Dysnomia.Website.WebApp.Tests {
	public class HomeControllerTest {
		public HttpClient client { get; }
		public TestServer server { get; }

		public HomeControllerTest() {
			var config = new ConfigurationBuilder()
				.AddJsonFile("appsettings.json", optional: false)
				.AddUserSecrets<Startup>()
				.Build();

			var builder = new WebHostBuilder()
				 .UseConfiguration(config)
				.UseStartup<Startup>()
				.UseEnvironment("Testing");
			var server = new TestServer(builder);

			client = server.CreateClient();
		}

		[Fact]
		public async void ShouldGet200_GET_Root() {
			var response = await client.GetAsync("/");

			response.StatusCode.Should().Be(HttpStatusCode.OK);
		}

		[Fact]
		public async void ShouldGet200_GET_Index() {
			var response = await client.GetAsync("/index");

			response.StatusCode.Should().Be(HttpStatusCode.OK);
		}

		[Fact]
		public async void ShouldGet200_GET_Root_FR() {
			var response = await client.GetAsync("/fr/");

			response.StatusCode.Should().Be(HttpStatusCode.OK);
		}

		[Fact]
		public async void ShouldGet200_GET_Index_FR() {
			var response = await client.GetAsync("/fr/index");

			response.StatusCode.Should().Be(HttpStatusCode.OK);
		}

		[Fact]
		public async void ShouldGet200_GET_Root_EN() {
			var response = await client.GetAsync("/en/");

			response.StatusCode.Should().Be(HttpStatusCode.OK);
		}

		[Fact]
		public async void ShouldGet200_GET_Index_EN() {
			var response = await client.GetAsync("/en/index");

			response.StatusCode.Should().Be(HttpStatusCode.OK);
		}

		[Fact]
		public async void ShouldGet200_POST_Contact_Empty() {
			var formVariables = new List<KeyValuePair<string, string>>();
			formVariables.Add(new KeyValuePair<string, string>("mail", "test@text.com"));
			formVariables.Add(new KeyValuePair<string, string>("txt", "test"));
			var formContent = new FormUrlEncodedContent(formVariables);

			var response = await client.PostAsync("/contact", formContent);

			response.StatusCode.Should().Be(HttpStatusCode.OK);
		}

		[Fact]
		public async void ShouldGet200_POST_Contact_Empty_EN() {
			var formVariables = new List<KeyValuePair<string, string>>();
			formVariables.Add(new KeyValuePair<string, string>("mail", "test@text.com"));
			formVariables.Add(new KeyValuePair<string, string>("txt", "test"));
			var formContent = new FormUrlEncodedContent(formVariables);

			var response = await client.PostAsync("/en/contact", formContent);

			response.StatusCode.Should().Be(HttpStatusCode.OK);
		}

		[Fact]
		public async void ShouldGet200_POST_Contact_Empty_FR() {
			var formVariables = new List<KeyValuePair<string, string>>();
			formVariables.Add(new KeyValuePair<string, string>("mail", "test@text.com"));
			formVariables.Add(new KeyValuePair<string, string>("txt", "test"));
			var formContent = new FormUrlEncodedContent(formVariables);

			var response = await client.PostAsync("/fr/contact", formContent);

			response.StatusCode.Should().Be(HttpStatusCode.OK);
		}

		[Fact]
		public async void ShouldGet200_GET_Error() {
			var response = await client.GetAsync("/error");

			response.StatusCode.Should().Be(HttpStatusCode.OK);
		}

		[Fact]
		public async void SendMail() {
			var controller = new HomeController(null);

			controller.SendMail("Unit Test", "unitTest@dysnomia.studio", "Unit Test", "Unit test mail sending");
		}
	}
}
