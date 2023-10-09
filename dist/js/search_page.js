document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("searchInput");
    const errorMessage = document.getElementById("errorMessage");
    
    searchInput.addEventListener("keydown", function(event) {
      if (event.key === "Enter") {
        const searchQuery = searchInput.value.toLowerCase();
        
        switch (searchQuery) {
          case "carreras":
            window.location.href = "../views/views_crud_admin_careers.php";
            break;
          case "profesores":
            window.location.href = "../views/views_teacher.php";
            break;
          case "preinscripciones":
            window.location.href = "../views/views_crud_pre_registered.php";
            break;
          case "estudiantes":
            window.location.href = "../views/views_students.php";
            break;
          case "usuarios":
            window.location.href = "../views/views_internal_users.php";
            break;
          default:
            // Oculta el mensaje de error si no se encuentra ninguna coincidencia
            errorMessage.style.display = "none";
            // Redirige a una página de búsqueda general
            window.location.href = "../views/search_results.php?query=" + encodeURIComponent(searchQuery);
            break;
        }
      }
    });
  });
  


