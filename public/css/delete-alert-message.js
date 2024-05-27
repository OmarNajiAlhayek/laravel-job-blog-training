document.addEventListener('DOMContentLoaded', function() {
    const deleteBtn = document.getElementById('delete-btn');
    const deleteForm = document.getElementById('delete-form');
  
    deleteBtn.addEventListener('click', function(e) {
      e.preventDefault(); // Prevent the form from submitting
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.value) {
          deleteForm.submit(); // Submit the form after confirmation
        }
      });
    });
  });
  