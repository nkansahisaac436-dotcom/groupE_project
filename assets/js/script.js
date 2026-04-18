document.addEventListener("DOMContentLoaded", function(){

    // ==============================
    // COURSE DYNAMIC LOADING (API VERSION)
    // ==============================

    const level = document.getElementById("level");
    const semester = document.getElementById("semester");
    const course = document.getElementById("course");

    if(level && semester && course){

        function loadCourses(){

            let level_id = level.value;
            let semester_id = semester.value;

            if(level_id && semester_id){

                fetch("/fesac_platform/api/get_courses.php?level_id=" + level_id + "&semester_id=" + semester_id)
                .then(response => response.json())
                .then(data => {

                    // Reset dropdown
                    course.innerHTML = "<option value=''>Select Course</option>";

                    // Fill courses
                    data.forEach(item => {
                        course.innerHTML += `<option value="${item.id}">${item.course_name}</option>`;
                    });

                })
                .catch(error => {
                    console.error("Error loading courses:", error);
                });

            }

        }

        level.addEventListener("change", loadCourses);
        semester.addEventListener("change", loadCourses);
    }

});


// ==============================
// SIDEBAR TOGGLE FUNCTION (CLEAN VERSION)
// ==============================

function toggleSidebar(){
    let sidebar = document.getElementById("sidebar");
    let overlay = document.getElementById("overlay");

    if(sidebar && overlay){
        sidebar.classList.toggle("active");
        overlay.classList.toggle("active");
    }
}

function loadNotifications(){

    fetch("/fesac_platform/api/get_notifications.php?role=student")
    .then(res => res.json())
    .then(data => {

        let box = document.getElementById("notifications");

        if(!box) return;

        box.innerHTML = "";

        if(data.length === 0){
            box.innerHTML = "<p>No notifications yet</p>";
        } else {

            data.forEach(n => {
                box.innerHTML += `
                    <div class="file-card">
                        <p>🔔 ${n.message}</p>
                        <small>${n.created_at}</small>
                    </div>
                `;
            });

        }

    })
    .catch(err => console.error(err));
}

document.addEventListener("DOMContentLoaded", loadNotifications);