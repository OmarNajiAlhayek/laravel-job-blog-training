


document.addEventListener('DOMContentLoaded', function() {
    const updateBtn = document.getElementById('update-btn');
    const updateForm = document.getElementById('update-form');
  
    updateBtn.addEventListener('click', function(e) {
      e.preventDefault(); // Prevent the form from submitting
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert old information!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, update it!"
      }).then((result) => {
        if (result.value) {
          updateForm.submit(); // Submit the form after confirmation
        }
      });
    });
  });
  