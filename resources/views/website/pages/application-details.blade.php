<!DOCTYPE html>
<html>
  <head>
    <title>Application Print Page</title>
    <style>
        #application-print {
  max-width: 800px;
  margin: 0 auto;
  font-family: Arial, sans-serif;
}

h1, h2 {
  margin-top: 0;
}

table {
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  padding: 10px;
  border: 1px solid #ddd;
}

table th {
  background-color: #f2f2f2;
}

.personal-info

      /* CSS styles go here */
      @media print {
        /* Print styles go here */
      }
      
      /* Display the image and personal info side by side */
      .personal-info {
        display: flex;
        align-items: center;
      }
      
      .personal-info-image {
        width: 30%;
      }
      
      .personal-info-image img {
        max-width: 100%;
        height: auto;
        display: block;
      }
      
      .personal-info-details {
        width: 70%;
      }
      
      .personal-info-details table {
        margin-bottom: 0;
      }
    </style>
  </head>
  <body>
    <div id="application-print">
      <h1>Application Information</h1>
      
      <h2>Personal Information</h2>
      <div class="personal-info">
        <div class="personal-info-image">
          <img src="https://khairat.netlify.app/assets/images/profile.jpg" width="100" height="100" alt="Profile Picture">
        </div>
        <div class="personal-info-details">
          <table>
            <tr>
              <td><strong>Name:</strong></td>
              <td>John Doe</td>
            </tr>
            <tr>
              <td><strong>Email:</strong></td>
              <td>john.doe@example.com</td>
            </tr>
            <tr>
              <td><strong>Phone:</strong></td>
              <td>(555) 123-4567</td>
            </tr>
          </table>
        </div>
      </div>

      <h2>Present Address</h2>
      <table>
        <tr>
          <td><strong>Address:</strong></td>
          <td>123 Main St, Anytown USA 12345</td>
        </tr>
      </table>

      <h2>Permanent Address</h2>
      <table>
        <tr>
          <td><strong>Address:</strong></td>
          <td>456 Oak Ave, Hometown USA 54321</td>
        </tr>
      </table>

      <h2>Education Information</h2>
      <table>
        <tr>
          <td><strong>Degree:</strong></td>
          <td>Bachelor of Science in Computer Science</td>
        </tr>
        <tr>
          <td><strong>School:</strong></td>
          <td>XYZ University</td>
        </tr>
        <tr>
          <td><strong>Graduation Date:</strong></td>
          <td>May 2020</td>
        </tr>
      </table>

      <h2>Work Experience</h2>
      <table>
        <tr>
          <td><strong>Job Title:</strong></td>
          <td>Software Engineer</td>
        </tr>
        <tr>
          <td><strong>Company:</strong></td>
          <td>ABC Corp</td>
        </tr>
        <tr>
          <td><strong>Employment Dates:</strong></td>
          <td>June 2020 - Present</td>
        </tr>
        <tr>
          <td><strong>Responsibilities:</strong></td>
          <td>Develop and maintain software applications</td>
        </tr>
      </table>
    </div>
  </body>
</html>
