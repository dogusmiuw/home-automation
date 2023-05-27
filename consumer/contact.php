<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
  <?php include("header.php") ?>

    <div class="containerre">
      <div class="contact-box">
        <div class="left"></div>
        <div class="right">
          <form id="form1" onkeyup="control('form1')">
            <h2>Contact Us</h2>
            <p style="display: flex; font-size: 1.5rem; color: #8f6c4a">
              All fields are required
            </p>
            <input
              name="name"
              type="text"
              class="field"
              placeholder="Your Name"
              required
            />
            <input
              name="_replyto"
              type="email"
              class="field"
              placeholder="Your Email"
              required
            />
            <input
              name="phone"
              type="text"
              class="field"
              placeholder="Your Phone"
              required
            />
            <textarea
              class="field"
              name="textarea"
              placeholder="Message"
              required
            ></textarea>
            <button
              class="btn"
              type="submit"
              value="Send"
              onclick="alert('Successfully Sent');"
            >
              Send
            </button>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="js/scripts.js"></script>
  </body>
</html>
