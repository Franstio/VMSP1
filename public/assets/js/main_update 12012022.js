(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    if (all) {
      select(el, all).forEach(e => e.addEventListener(type, listener))
    } else {
      select(el, all).addEventListener(type, listener)
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Sidebar toggle
   */
  if (select('.toggle-sidebar-btn')) {
    on('click', '.toggle-sidebar-btn', function(e) {
      select('body').classList.toggle('toggle-sidebar')
    })
  }

  /**
   * Search bar toggle
   */
  if (select('.search-bar-toggle')) {
    on('click', '.search-bar-toggle', function(e) {
      select('.search-bar').classList.toggle('search-bar-show')
    })
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Initiate tooltips
   */
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })


})();
function rl(){
  location.reload(); 
}

//step 1b untuk kirim data ke HIKVISION
function upload(photo,nama) {
 
  fetch("/upload", {
    method: "POST",
    body: JSON.stringify({ photo: photo,nama: nama }),
  }).then((_res) => {
    
  });
}

//step 3 Menampilkan data di html dan menyimpan data ke DB Transaksi Checkin
function ok(){


  document.getElementById("statusA1").innerHTML = "";
  document.getElementById("imgA1").src = "assets/img/checked.png";
  document.getElementById("imgA1").style.height = "210px"
  var image_x = document.getElementById('imgB1');
  image_x.parentNode.removeChild(image_x)
  document.getElementById("statusB1").innerHTML = "Data anda telah \<br\> tersimpan,silahkan \<br\> menuju ke loket \<br\> sekuriti ";
  document.getElementById("statusB1").style.fontSize = "5rem"
  document.getElementById("imgC1").src = "";
  
  
  document.getElementById("bubble-2").classList.remove('green-text');
  document.getElementById("step-2").classList.remove('current');
  document.getElementById("bubble-3").classList.add('green-text');
  document.getElementById("step-3").classList.add('current');
  let badge = document.getElementById("badge1").innerHTML; 
  let qrdata = document.getElementById("dataqr").innerHTML;
  let time2 = document.getElementById("today").innerHTML;
  fetch("/savetotransaksicheckin", {
    method: "POST",
    body: JSON.stringify({ time:time2, qr: qrdata, badge:badge}),
  }).then((_res) => {
    
  });
  
  setTimeout(rl,1000)



}

//step 1a 
function getVisitor(qr){
  // let qrCode = qr.split(':')
  fetch("/getcheckindata", {
    method: "POST",
    body: JSON.stringify({ qr:qr.value }),
  }).then((response) => {
    return response.json()
  }).then((data) => {
    if(data.nik == undefined){
      document.getElementById("statusB1").innerHTML = "Tidak Ada Permit";
      document.getElementById("statusB1").style.fontSize = "5rem";
      document.getElementById("imgC1").src = "assets/img/nopermit.png";
      setTimeout(rl,5000)
    }else if(data.status == 'checkin' || data.status == 'waiting'){
      document.getElementById("statusB1").innerHTML = "User already Checkin"
      setTimeout(rl,5000)
    }else{
      upload(data.photo,data.nama)
      document.getElementById("dataqr").innerHTML = data.qr;
      document.getElementById("name1").innerHTML = data.nama;
      document.getElementById("nik1").innerHTML = data.nik;
      document.getElementById("badge1").innerHTML = data.badge;
      document.getElementById("vendor1").innerHTML = data.company
      document.getElementById("photo1").src = "data:image/png;base64,"+data.photo;
      document.getElementById("txtBox1").value = "";
      
    
      var today = new Date();
      var time = today.toTimeString().split(' ')[0];
      document.getElementById("time1").innerHTML = time;
      document.getElementById("today").innerHTML = today.toISOString()

      document.getElementById("statusA1").innerHTML = "Visitor need to scan their face at thermal \<br\> camera to check temperature";
      document.getElementById("imgA1").src = "assets/img/step2A.png";
      document.getElementById("imgB1").src = "assets/img/step2B.png";
      document.getElementById("statusB1").innerHTML = "Scan wajah anda pada \<br\> Thermal Camera \<br\> untuk cek suhu";
      document.getElementById("statusB1").style.fontSize = "5rem"
      document.getElementById("imgC1").src = "";
      
      document.getElementById("bubble-1").classList.remove('green-text');
      document.getElementById("step-1").classList.remove('current');
      document.getElementById("bubble-2").classList.add('green-text');
      document.getElementById("step-2").classList.add('current');
      document.getElementById('txtBox1').id = "txtBox2";
      document.getElementById('txtBox2').onchange =  function () { ok(); };
      setTimeout(rl,5000)
    
    }
  });
}


function dataPermit(id){
  fetch("/permitdetail", {
    method: "POST",
    body: JSON.stringify({ id:id}),
  }).then((response) => {
    return response.json()
  }).then((data) => {
    
})
}


async function getCheckout(rfid){

  
  const res = await fetch("/getcheckoutdatatransaksi", {
    method: "POST",
    body: JSON.stringify({ rfid:rfid.value }),
  })
  const data = await res.json()
  if (data.nik == undefined){
      document.getElementById("statusA1").innerHTML = "Has been Checkout or data Not Found!";
      setTimeout(rl,3000)
  }else{
      let today = new Date();
      let time = today.toTimeString().split(' ')[0];
      document.getElementById("time2").innerHTML = time;
      document.getElementById("today").innerHTML = today.toISOString()

      document.getElementById("name2").innerHTML = data.namaVisitor;
      document.getElementById("nik2").innerHTML = data.nik;
      document.getElementById("badgeno2").innerHTML = data.badge;
      document.getElementById("company2").innerHTML = data.vendor
     
      document.getElementById("photo2").src = "data:image/png;base64,"+data.photo;
      document.getElementById("statusA1").innerHTML = "Visitor badge has read. \<br\> Host please confirm within 10 seconds";
      document.getElementById("imgA1").src = "assets/img/step2A.png";
      document.getElementById("bubble-1").classList.remove('green-text');
      document.getElementById("step-1").classList.remove('current');
      document.getElementById("bubble-2").classList.add('green-text');
      document.getElementById("step-2").classList.add('current');

      document.getElementById('txtBox1').id = "txtBox2";
      document.getElementById("txtBox2").value = "";

      let Host = data.host.split(':')
      let empID = Host[1]
      //console.log(Host)
      let nik = data.nik
      let badge = data.badge
      let TimeCO = today.toISOString()
      if(data.purpose == 'SUPPLY'|| data.purpose == 'WORKING' || data.purpose == 'OVERTIME'){
        const res3 = await fetch("/updatedatacheckout", {
          method: "POST",
          body: JSON.stringify({ Nik:nik, Badge:badge, TimeCO:TimeCO }),

        })
        document.getElementById("statusA1").innerHTML = "";
        document.getElementById("imgA1").src = "assets/img/checkedout.png";
        document.getElementById("imgB1").src = "";
        document.getElementById("bubble-2").classList.remove('green-text');
        document.getElementById("step-2").classList.remove('current');
        document.getElementById("bubble-3").classList.add('green-text');
        document.getElementById("step-3").classList.add('current');
        setTimeout(rl,3000)
      }else{
      document.getElementById('txtBox2').onchange =  function () { getStaffCO(empID,this); };
      setTimeout(rl,3000)
      }
  }
 
}


async function getStaffCO(empTransaksi,badgeId){
  const res = await fetch("/getstaffco", {
    method: "POST",
    body: JSON.stringify({ badgeID:badgeId.value}),
  })
  const data = await res.json();
  if(empTransaksi != data.empID){
    document.getElementById("statusA1").innerHTML = "different hosts";
    setTimeout(rl,3000)
  }
  else{
  var today = new Date();
  document.getElementById("namaHost").innerHTML = data.firstName;
  document.getElementById("empID").innerHTML = data.empID;
  document.getElementById("depart").innerHTML = data.depart;
  document.getElementById("timeHost").innerHTML = today.toISOString();
  document.getElementById("imgB1").src = "";
  document.getElementById("statusA1").innerHTML = "";
  document.getElementById("imgA1").src = "assets/img/checkedout.png";
  document.getElementById("bubble-2").classList.remove('green-text');
  document.getElementById("step-2").classList.remove('current');
  document.getElementById("bubble-3").classList.add('green-text');
  document.getElementById("step-3").classList.add('current');
  document.getElementById("photo").src = "data:image/png;base64,"+data.photo;
  
  let nik = document.getElementById("nik2").innerHTML
  let badge = document.getElementById("badgeno2").innerHTML
  let timeCheckout = document.getElementById("today").innerHTML

  const res2 = await fetch("/updatedatacheckout", {
    method: "POST",
    body: JSON.stringify({ Nik:nik, Badge:badge, TimeCO:timeCheckout }),
  
    
  })
  setTimeout(rl,1000)
}

 
  
}