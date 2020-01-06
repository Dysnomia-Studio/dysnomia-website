using System.Diagnostics;
using System.Threading.Tasks;

using Dysnomia.Website.WebApp.Models;

using MailKit.Net.Smtp;

using Microsoft.AspNetCore.Mvc;

using MimeKit;

using reCAPTCHA.AspNetCore;

namespace Dysnomia.Website.WebApp.Controllers {
	public class HomeController : Controller {
		private readonly IRecaptchaService _recaptcha;
		public HomeController(IRecaptchaService recaptcha) {
			_recaptcha = recaptcha;
		}

		[HttpGet]
		[Route("/")]
		[Route("{culture}/")]
		[Route("index")]
		[Route("{culture}/index")]
		public IActionResult Index() {
			return View();
		}

		[HttpPost]
		[Route("contact")]
		[Route("{culture}/contact")]
		public async Task<ActionResult> Contact(string mail, string txt) {
			var recaptcha = await _recaptcha.Validate(Request, false); // @TODO: find a better way, that allow only some domains
			if (string.IsNullOrWhiteSpace(mail) || string.IsNullOrWhiteSpace(txt) || !recaptcha.success) {
				@ViewData["Message"] = "CONTACT_NOK";
				return View("Index");
			}

			var message = new MimeMessage();
			message.From.Add(new MailboxAddress("Elanis - Contact Form", "***REMOVED***"));
			message.To.Add(new MailboxAddress("Elanis", "***REMOVED***"));
			message.Subject = "Contact Form";

			message.Body = new TextPart("plain") {
				Text = txt + "\n\n\n" + mail
			};

			using (var client = new SmtpClient()) {
				// For demo-purposes, accept all SSL certificates (in case the server supports STARTTLS)
				client.ServerCertificateValidationCallback = (s, c, h, e) => true;

				client.Connect("***REMOVED***", 587, false);

				// Note: only needed if the SMTP server requires authentication
				client.Authenticate("***REMOVED***", "***REMOVED***");

				client.Send(message);
				client.Disconnect(true);
			}

			@ViewData["Message"] = "CONTACT_OK";

			return View("Index");
		}

		[ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
		public IActionResult Error() {
			return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
		}
	}
}
