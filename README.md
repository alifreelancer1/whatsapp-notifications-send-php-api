WhatsApp Message Sender
This repository contains PHP scripts to send WhatsApp messages using the WCRM API. The application includes a simple web form (index.php) for inputting a phone number, message, and priority level, and a backend script (send.php) to handle API requests.
Prerequisites

A web server with PHP (version 7.4 or higher) and cURL extension enabled.
A Postabi.com account with API keys (appkey and authkey).
A WhatsApp account linked to a device via Postabi.com.

Setup Instructions
1. Create a Postabi.com Account

Visit Postabi.com and sign up for an account.
Choose a plan: Either purchase a paid plan or opt for the free 14-day trial.
After account creation, log in to your Postabi.com dashboard.

2. Configure WhatsApp Device

Navigate to the "Devices" section in the Postabi.com dashboard.
Add a new device and follow the instructions to scan the WhatsApp QR code using your WhatsApp mobile application.
Ensure the device is successfully linked and active.

3. Create an Application and Obtain API Keys

Go to the "Apps" section in the Postabi.com dashboard.
Create a new application by providing your website URL.
Once the application is created, copy the appkey and authkey provided in the application details.

4. Configure the PHP Scripts

Clone or download this repository to your web server.
Open the send.php file and replace the placeholder API keys with your own:'appkey' => 'your_appkey_here',
'authkey' => 'your_authkey_here',

Replace your_appkey_here and your_authkey_here with the keys obtained from Postabi.com.

5. Deploy the Application

Ensure the index.php and send.php files are placed in your web server's root directory or a subdirectory.
Make sure the web server is running and the files are accessible via a URL (e.g., http://yourdomain.com/index.php).

Usage

Access the web form by navigating to index.php in your browser.
Enter the recipient's phone number in international format (e.g., +923001234567).
Type your message and select a priority level (1, 2, or 3).
Click "Send" to submit the form.
The send.php script will validate the input, send the message via the WCRM API, and display the result (e.g., message ID and status or an error message).

Files

index.php: A web form for entering the phone number, message, and priority level.
send.php: A PHP script that validates inputs, sends the API request, and processes the response.

Notes

The phone number must include the country code and be 10 to 15 digits long (e.g., +923001234567).
The priority level must be 1, 2, or 3. If not specified, it defaults to 1.
Ensure the API keys are kept secure and not exposed in public repositories.
The sandbox parameter in send.php is set to 'false' for live messaging. For testing, consult Postabi.com documentation to enable sandbox mode.

Troubleshooting

Invalid Phone Number Format: Ensure the phone number starts with a + followed by 10 to 15 digits.
Invalid Priority Level: Verify that the priority is set to 1, 2, or 3.
cURL or API Errors: Check your server's cURL configuration and ensure the WCRM API endpoint (https://wcrm.bestmallbey.shop/api/submit-request) is accessible.
For further assistance, refer to the Postabi.com support documentation or contact their support team.

License
This project is provided for educational purposes. Ensure compliance with Postabi.com's terms of service and WhatsApp's policies when using this application.
