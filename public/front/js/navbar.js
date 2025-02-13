/*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
          nav = document.getElementById(navId)
 
    toggle.addEventListener('click', () =>{
        // Add show-menu class to nav menu
        nav.classList.toggle('show-menu')
 
        // Add show-icon to show and hide the menu icon
        toggle.classList.toggle('show-icon')
    })
 }
 
 showMenu('nav-toggle','nav-menu')
 
 document.getElementById('tahunSelect').addEventListener('change', filterTable);
         document.getElementById('searchInput').addEventListener('keyup', filterTable);
 
         function filterTable() {
             var searchValue = document.getElementById('searchInput').value.toLowerCase();
             var selectedTahun = document.getElementById('tahunSelect').value;
             var tableRows = document.querySelectorAll('#tableBody tr');
 
             tableRows.forEach(function(row) {
                 var judul = row.getAttribute('data-judul').toLowerCase();
                 var tahun = row.getAttribute('data-tahun');
 
                 // Filter berdasarkan judul dan tahun
                 var isTitleMatch = judul.includes(searchValue);
                 var isTahunMatch = !selectedTahun || tahun === selectedTahun;
 
                 if (isTitleMatch && isTahunMatch) {
                     row.style.display = '';
                 } else {
                     row.style.display = 'none';
                 }
             });
         }
     // Function to show complaint details when clicked
     function showComplaintDetail(title, text, user, date) {
         // Set the complaint detail data dynamically
         document.getElementById('complaintTitle').innerText = title;
         document.getElementById('complaintText').innerHTML = `
             <div class="complaint-header">
                 <span class="complaint-user"><strong>${user}</strong></span>
                 <span class="complaint-date">📅 ${date}</span>
             </div>
             <p>${text}</p>
         `;
 
         // Show the complaint detail section
         document.getElementById('complaintDetail').style.display = 'block';
     }