<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../FrontEnd/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Critical Incident Report</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../CSS/style.css"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../JavaScript/script.js"></script>
  <link rel="icon" type="image/x-icon" href="../Images/ha.ico">
<body>
<img src="../Images/cropped-site-logo.png" alt="Logo" class="logo">
  <div class="container">
    <h1 class="form-title">Critical Incident Report</h1>
    <form action="../Database/form_db.php" id="incidentForm" method="post">
      <div class="main-user-info">
        <div class="user-input-box">
          <label for="date">Date:</label>
          <input type="date" id="date" name="date" value="" required />
        </div>
        <div class="user-input-box">
          <label for="fullName">Employee's name:</label>
          <input type="text" id="fullName" name="fullName" placeholder="Enter Full Name" required/>
        </div>
        <div class="user-input-box">
          <label for="jobPosition">Job Position:</label>
          <input type="text" id="jobPosition" name="jobPosition" placeholder="Enter Job Position" required/>
        </div>
          <div class="user-input-box nature-of-incident">
            <label for="incident">Nature of Incident:</label>
            <div class="incident-category">
              <input type="radio" name="natureOfIncident" id="pos" value="Positive" required />
              <label for="positive">Positive</label>
              <input type="radio" name="natureOfIncident" id="neg" value="Negative" />
              <label for="negative">Negative</label>
          </div>
        </div>
        <div class="user-input-box">
            <label for="dimension">Competency or Performance Dimension:</label>
            <select id="dimension" name="dimension" required>
              <option value="" disabled selected>Select an option</option>
              <option value="Knowledge of work">Knowledge of work</option>
              <option value="Quantity of work">Quantity of work</option>
              <option value="Quality of work">Quality of work</option>
              <option value="Problem solving/Decision making">Problem solving/Decision making</option>
              <option value="Communication skills">Communication skills</option>
              <option value="Initiative">Initiative</option>
              <option value="Dependability/Responsibility">Dependability/Responsibility</option>
              <option value="Quality of Interpersonal relationships">Quality of Interpersonal relationships</option>
              <option value="Attendance">Attendance</option>
              <option value="Punctuality">Punctuality</option>
            </select>
          </div>
        </div>
        <div class="additional-section">
            <div class="user-input-box">
              <label for="situationDescription">Description of Situation:</label>
              <textarea id="situationDescription" name="situationDescription" placeholder="Enter a detailed description..." required></textarea>
            </div>
            <div class="user-input-box">
              <label for="employeesBehavior">Employee's Behavior and Specified Actions:</label>
              <textarea id="employeesBehavior" name="employeesBehavior" placeholder="Enter employee's behavior and specified actions..." required></textarea>
            </div>
          </div>
          <div class="additional-section">
            <div class="user-input-box">
              <label for="impactOnStakeholders">Impact on Stakeholders and Organization:</label>
              <textarea id="impactOnStakeholders" name="impactOnStakeholders" placeholder="Enter impact on stakeholders and organization..." required></textarea>
            </div>
            <div class="user-input-box">
              <label for="appraisersComments">Appraiser's Comments and Observations:</label>
              <textarea id="appraisersComments" name="appraisersComments" placeholder="Enter appraiser's comments and observations..." required></textarea>
            </div>
          </div>   
          <div class="additional-section">
            <div class="user-input-box">
              <label for="trainingRecommendations">Training Recommendations:</label>
              <textarea id="trainingRecommendations" name="trainingRecommendations" placeholder="Enter training recommendations..."required></textarea>
            </div>
          </div>
      <div class="form-submit-btn">
        <button type="submit" class="btn" onclick="openPopup()" value="Submit">Submit</button>
      </div>
      <div class="popup" id="popup">
        <img src="../Images/404-tick.png">
        <h2>Thank You!</h2>
        <p>Critical Incident Report has been successfully submitted. Thanks!</p>
        <button type="button" onclick="closePopup()">OK</button>
      </div>
    <div class="error-popup" id="error-popup">
      <img src="../Images/error-404.png">
      <h2>Error!</h2>
      <p>Competency or Performance Dimension for this user has already been entered today.</p>
      <button type="button" onclick="closeErrorPopup()">OK</button>
    </div>
    </form>
    </div>
</div>
</body>
</html>