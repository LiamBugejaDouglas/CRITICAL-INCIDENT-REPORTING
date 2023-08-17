document.addEventListener("DOMContentLoaded", function () {
  //Set date to current day
  const currentDate = new Date().toISOString().slice(0, 10);
  document.getElementById('date').value = currentDate;

  //Initiate popup
  let popup = document.getElementById("popup");

  //Event open popup (done)
  function openPopup() {
    popup.classList.add("open-popup");
  }
  
  //Event open popup (error)
  function openErrorPopup() {
    document.getElementById("error-popup").style.display = "block";
  }

  //Event Submit data
  document.getElementById("incidentForm").addEventListener("submit", function(event) {
    event.preventDefault();

    // Perform the AJAX request
    $.ajax({
      type: 'POST',
      url: 'form_db.php',
      data: $(this).serialize(),
      success: function(response) {
        if (response === 'done') {
          openPopup(); // Show success popup
        } else {
          openErrorPopup(); // Show error popup
        }
      },
      error: function() {
        openErrorPopup(); // Show error popup on AJAX error
      }
    });
  });
});

//Close Popup (done)
function closePopup() {
  popup.classList.remove("open-popup");
  //Reload page
  location.reload();
}
//Close Error Popup
function closeErrorPopup() {
  document.getElementById("error-popup").style.display = "none";
}