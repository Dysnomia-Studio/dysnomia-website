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
		public async Task<ActionResult> Contact(string name, string mail, string objet, string message) {
			try {
				var recaptcha = await _recaptcha.Validate(Request, false); // @TODO: find a better way, that allow only some domains
				if (string.IsNullOrWhiteSpace(name) || string.IsNullOrWhiteSpace(mail) || string.IsNullOrWhiteSpace(objet) || string.IsNullOrWhiteSpace(message) || !recaptcha.success) {
					@ViewData["Message"] = "Votre message n'a pas pu être envoyé, veuillez reessayer et veiller à completer le captcha.";
					return View("Index");
				}

				SendMail(name, mail, objet, message);

				@ViewData["Message"] = "Votre message a bien été transmis !";
			} catch (System.ComponentModel.DataAnnotations.ValidationException e) {
				@ViewData["Message"] = "Votre message n'a pas pu être envoyé, veuillez reessayer et veiller à completer le captcha.";
				// TODO: Log it
			}

			return View("Index");
		}

		[NonAction]
		public void SendMail(string name, string mail, string objet, string message) {
			var messageMail = new MimeMessage();
			messageMail.From.Add(new MailboxAddress("Dysnomia - Contact Form", "***REMOVED***"));
			messageMail.To.Add(new MailboxAddress("Dysnomia", "***REMOVED***"));
			messageMail.Subject = "Contact Form - " + objet;

			messageMail.Body = new TextPart("plain") {
				Text = message + "\n\n\n" + name + "( " + mail + " )"
			};

			using (var client = new SmtpClient()) {
				// For demo-purposes, accept all SSL certificates (in case the server supports STARTTLS)
				client.ServerCertificateValidationCallback = (s, c, h, e) => true;

				client.Connect("***REMOVED***", 587, false);

				// Note: only needed if the SMTP server requires authentication
				client.Authenticate("***REMOVED***", "***REMOVED***");

				client.Send(messageMail);
				client.Disconnect(true);
			}
		}

		[ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
		public IActionResult Error() {
			return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
		}
	}
}
