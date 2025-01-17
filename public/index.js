function delStaff(id) {
 
  fetch("/delstaff", {
    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((_res) => {
    window.location.href = "/staff";
  });
}

function getStaff(id){
  
  fetch("/getstaff", {
    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((response) => {
    return response.json()
  }).then((data) => {
    
    document.getElementById("editH").innerHTML = "Username : " + data.userName;
    document.getElementById("userNamee").value = data.userName;
    document.getElementById("namee").value = data.firstName;
    document.getElementById("emaile").value = data.email;
    document.getElementById("rolee").innerHTML = `<option value="${data.role}">${data.role}</option>
    <option value="Admin">Admin</option>
    <option value="Host">Host</option>
    <option value="Security">Security</option>`;
    document.getElementById("empIDe").value = data.empID;
    document.getElementById("badgeIDe").value = data.badgeID;
    document.getElementById("departe").value = data.depart;
  });
}
function editPhoto(id){
  fetch("/getstaff", {
    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((response) => {
    return response.json()
  }).then((data) => {
    
    document.getElementById("editPhoto").src = "data:image/png;base64,"+data.photo;
    document.getElementById("editH2").innerHTML = "Username : " + data.userName;
    document.getElementById("userNamePhoto").value = data.userName;
    
  });
}
//data:image/png;base64,{{ user.photo }}

function editPass(id){
  fetch("/getstaff", {
    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((response) => {
    return response.json()
  }).then((data) => {
    
    
    document.getElementById("editH3").innerHTML = "Username : " + data.userName;
    document.getElementById("userNamePass").value = data.userName;
    
  });
}

//getvisitor
function getVisitor(nik){
  
  fetch("/getvisitor", {
    method: "POST",
    body: JSON.stringify({ nik: nik }),
  }).then((response) => {
    return response.json()
  }).then((data) => {
    
    document.getElementById("idVisitor").value = data.id;
    document.getElementById("nameedit").value = data.nama;
    document.getElementById("nikedit").value = data.nik;
    document.getElementById("companyedit").value = data.company;
    upload(data.photo)
  });
}



function delVisitor(id) {
 
  fetch("/delvisitor", {
    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((_res) => {
    window.location.href = "/visitor";
  });
}


function editPhotoV(id){
  fetch("/getvisitor", {
    method: "POST",
    body: JSON.stringify({ nik: id }),
  }).then((response) => {
    return response.json()
  }).then((data) => {
   
    document.getElementById("editPhoto").src = "data:image/png;base64,"+data.photo;
    document.getElementById("editH2").innerHTML = "Username : " + data.nama;
    document.getElementById("visitorID").value = data.id;
    
    
    
  });
}

// Halaman Home User Host
function getPermitdetail(id){
  
  fetch("/permitdetail", {

    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((response) => {
    return response.json()
  }).then((data) => {
    console.log(moment.utc(data.startDate).format('DD-MM-YYYY HH:mm:ss'))
    document.getElementById("idPermitReject").value = data.id
    document.getElementById("permitDetailVendor").innerHTML = data.vendor
    let startDate = moment.utc(data.startDate).format('DD-MM-YYYY HH:mm:ss')
    let endDate = moment.utc(data.endDate).format('DD-MM-YYYY HH:mm:ss')
    document.getElementById("permitDetailDate").innerHTML =  startDate + " until " + endDate 
    document.getElementById("permitDetailPurpose").innerHTML = data.purpose
    document.getElementById("permitDetailtask").innerHTML = (data.desk === '') ? "-" : data.desk 
    document.getElementById("permitDetailPermitNo").innerHTML = (data.permitNo === '') ? "-" : data.permitNo
    
    // warningPermit = ''
    // document.getElementById("warningStatus").innerHTML = ''
    // document.getElementById("generatebuttonxls").onclick = function () { generatexls(data.id); };
    let buttonEnable = '<span class="badge rounded-pill bg-success">Generate</span>'
    if(data.buttongenerate == 'enable'){
      let gb = document.getElementById("generatebuttonxls")
      gb.innerHTML = buttonEnable
      // gb.href =  'javascript:void(0)'
      gb.onclick = function () { generatexls(data.id); };
      if(data.status == 'waitingadmin'){
        let WS = document.getElementById("warningStatus")
        WS.innerHTML = '<h8 style="color:#f00c0c" >Waiting Approval from HR-Dept</h8>'
      }
    }else{
      let WS = document.getElementById("warningStatus")
      WS.innerHTML = '<h8 style="color:#f00c0c" >Employee data is not completed</h8><br>'
      // '<h8 style="color:#f00c0c" >Waiting Approval from HR-Dept</h8>'
    }
    let tableRef = document.getElementById('permitDetailAnggota');
    var tableHeaderRowCount = 1;
    var rowCount = tableRef.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
        tableRef.deleteRow(tableHeaderRowCount);
    }
    let noUrut = 0
    for (anggota of data.anggota) {
    // Insert a row at the end of the table
      let newRow = tableRef.insertRow(-1);

      // Insert a cell in the row at index 0
      let newCell = newRow.insertCell(0);
      let newCell1 = newRow.insertCell(1);
      let newCell2 = newRow.insertCell(2);
      let newCell3 = newRow.insertCell(3);
      let newCell4 = newRow.insertCell(4)
      let newCell5 = newRow.insertCell(5)
      // Append a text node to the cell
      noUrut += 1
      let newNo = document.createTextNode(noUrut);

      let newName = document.createTextNode(anggota.Nama);
      let newJabatan = document.createTextNode(anggota.Jabatan);
      let newNik = document.createTextNode(anggota.NIK);
      let newRegister = document.createTextNode( centang = (anggota.Register == "ya") ? "✅":"❌")
      let newCovid = document.createTextNode(centang1 = (anggota.Covid == "ya") ? "✅":"❌");
      newCell.appendChild(newNo);
      newCell1.appendChild(newName);
      newCell2.appendChild(newJabatan);
      newCell3.appendChild(newNik);
      newCell4.appendChild(newRegister);
      newCell5.appendChild(newCovid);
    }

    let tableRef2 = document.getElementById('permitBarangBawaan');
    let tabelHeader = `<tr>
    <th scope="col">No</th>
    <th scope="col">Name</th>
    <th scope="col">NIK</th>
    <th scope="col">Controlled Items</th>
    <th scope="col">SN</th>

  </tr>`
    if(data.bawaBarang == 'YA'){
      document.getElementById('permitBarangBawaan').innerHTML = tabelHeader
      var tableHeaderRowCount2 = 1;
      var rowCount2 = tableRef2.rows.length;
      for (var i = tableHeaderRowCount2; i < rowCount2; i++) {
          tableRef2.deleteRow(tableHeaderRowCount2);
      }
      let noUrut2 = 0
      for (barang of data.barangBawaan) {
      // Insert a row at the end of the table
        let newRow = tableRef2.insertRow(-1);

        // Insert a cell in the row at index 0
        let newCell = newRow.insertCell(0);
        let newCell1 = newRow.insertCell(1);
        let newCell2 = newRow.insertCell(2);
        let newCell3 = newRow.insertCell(3);
        let newCell4 = newRow.insertCell(4);

        
        // Append a text node to the cell
        noUrut2 += 1
        let newNo = document.createTextNode(noUrut2);

        let newName = document.createTextNode(barang['Nama Pemilik']);
        let newNik = document.createTextNode(barang['NIK']);
        let newItem = document.createTextNode(barang['Jenis Media']);
        let newDetail = document.createTextNode(barang.SN);
        
        newCell.appendChild(newNo);
        newCell1.appendChild(newName);
        newCell2.appendChild(newNik);
        newCell3.appendChild(newItem);
        newCell4.appendChild(newDetail);
    
      }
    } else{
      document.getElementById('permitBarangBawaan').innerHTML = '-'

    } 

  });
}


// Halaman admin Approval List
function getApprovalList(id){
  
  fetch("/permitdetail", {

    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((response) => {
    return response.json()
  }).then((data) => {
    
    document.getElementById("idPermitReject").value = data.id
    document.getElementById("permitDetailVendor").innerHTML = data.vendor
    let startDate = moment.utc(data.startDate).format('DD-MM-YYYY HH:mm:ss')
    let endDate = moment.utc(data.endDate).format('DD-MM-YYYY HH:mm:ss')

    document.getElementById("permitDetailDate").innerHTML = startDate + " until " + endDate
    document.getElementById("permitDetailPurpose").innerHTML = data.purpose
    document.getElementById("permitDetailtask").innerHTML = (data.desk == null || data.desk == "" ) ? "-" : data.desk
    document.getElementById("permitDetailPermitNo").innerHTML = (data.permitNo == null || data.desk == "" ) ? "-" : data.permitNo
    // document.getElementById("generatebuttonxls").onclick = function () { generatexls(data.id); };
    let buttonEnable = '<span class="badge rounded-pill bg-success">Approve</span>'
    let Host = data.host.split(':');
    let empId = Host[1] 

    if(data.buttongenerate == 'enable'){
      let gb = document.getElementById("buttonAdminApprove")
      gb.innerHTML = buttonEnable
      // gb.href =  'javascript:void(0)'
      if(data.purpose == 'WORKING'){
      gb.onclick = function () { approveWorkingAdmin(data.id , empId) };
      }
      if(data.purpose == 'OVERTIME'){
      gb.onclick = function () { approveOvertimeAdmin(data.id) };
      }
      if(data.status == 'waitingadmin'){
        let WS = document.getElementById("warningStatus")
        WS.innerHTML = '<h8 style="color:#f00c0c" >Waiting Approval from HR-Dept</h8>'
      }
    }else{
      let WS = document.getElementById("warningStatus")
      WS.innerHTML = '<h8 style="color:#f00c0c" >Employee data is not completed</h8><br>'
      // '<h8 style="color:#f00c0c" >Waiting Approval from HR-Dept</h8>'
    }
    let tableRef = document.getElementById('permitDetailAnggota');
    var tableHeaderRowCount = 1;
    var rowCount = tableRef.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
        tableRef.deleteRow(tableHeaderRowCount);
    }
    let noUrut = 0
    for (anggota of data.anggota) {
    // Insert a row at the end of the table
      let newRow = tableRef.insertRow(-1);

      // Insert a cell in the row at index 0
      let newCell = newRow.insertCell(0);
      let newCell1 = newRow.insertCell(1);
      let newCell2 = newRow.insertCell(2);
      let newCell3 = newRow.insertCell(3);
      let newCell4 = newRow.insertCell(4)
      let newCell5 = newRow.insertCell(5)
      // Append a text node to the cell
      noUrut += 1
      let newNo = document.createTextNode(noUrut);

      let newName = document.createTextNode(anggota.Nama);
      let newJabatan = document.createTextNode(anggota.Jabatan);
      let newNik = document.createTextNode(anggota.NIK);
      let newRegister = document.createTextNode( centang = (anggota.Register == "ya") ? "✅":"❌")
      let newCovid = document.createTextNode(centang1 = (anggota.Covid == "ya") ? "✅":"❌");
      newCell.appendChild(newNo);
      newCell1.appendChild(newName);
      newCell2.appendChild(newJabatan);
      newCell3.appendChild(newNik);
      newCell4.appendChild(newRegister);
      newCell5.appendChild(newCovid);
    }

    let tableRef2 = document.getElementById('permitBarangBawaan');
    let tabelHeader = `<tr>
    <th scope="col">No</th>
    <th scope="col">Name</th>
    <th scope="col">NIK</th>
    <th scope="col">Controlled Items</th>
    <th scope="col">SN</th>
  </tr>`
    if(data.bawaBarang == 'YA'){
      document.getElementById('permitBarangBawaan').innerHTML = tabelHeader
      var tableHeaderRowCount2 = 1;
      var rowCount2 = tableRef2.rows.length;
      for (var i = tableHeaderRowCount2; i < rowCount2; i++) {
          tableRef2.deleteRow(tableHeaderRowCount2);
      }
      let noUrut2 = 0
      for (barang of data.barangBawaan) {
      // Insert a row at the end of the table
        let newRow = tableRef2.insertRow(-1);

        // Insert a cell in the row at index 0
        let newCell = newRow.insertCell(0);
        let newCell1 = newRow.insertCell(1);
        let newCell2 = newRow.insertCell(2);
        let newCell3 = newRow.insertCell(3);
        let newCell4 = newRow.insertCell(4);

        
        // Append a text node to the cell
        noUrut2 += 1
        let newNo = document.createTextNode(noUrut2);

        let newName = document.createTextNode(barang['Nama Pemilik']);
        let newNik = document.createTextNode(barang['NIK']);
        let newItem = document.createTextNode(barang['Jenis Media']);
        let newDetail = document.createTextNode(barang.SN);
        
        newCell.appendChild(newNo);
        newCell1.appendChild(newName);
        newCell2.appendChild(newNik);
        newCell3.appendChild(newItem);
        newCell4.appendChild(newDetail);
    
      }
    } else{
      document.getElementById('permitBarangBawaan').innerHTML = '-'

    } 

  });
}


function getPermitAprovalHistory(id){
  
  fetch("/permitdetail", {

    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((response) => {
    return response.json()
  }).then((data) => {
    
  
    document.getElementById("permitDetailVendor").innerHTML = data.vendor
    let startDate = moment.utc(data.startDate).format('DD-MM-YYYY HH:mm:ss')
    let endDate = moment.utc(data.endDate).format('DD-MM-YYYY HH:mm:ss')
    document.getElementById("permitDetailDate").innerHTML = startDate + " until " + endDate
    document.getElementById("permitDetailPurpose").innerHTML = data.purpose
    document.getElementById("permitDetailtask").innerHTML = (data.desk == null || data.desk ==  '' ) ? "-" : data.desk 
    document.getElementById("permitDetailPermitNo").innerHTML = (data.permitNo == null || data.permitNo == '' ) ? "-" : data.permitNo
    // document.getElementById("generatebuttonxls").onclick = function () { generatexls(data.id); };
    
    let tableRef = document.getElementById('permitDetailAnggota');
    var tableHeaderRowCount = 1;
    var rowCount = tableRef.rows.length;
    
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
        tableRef.deleteRow(tableHeaderRowCount);
    }
    let noUrut = 0
    for (anggota of data.anggota) {
    // Insert a row at the end of the table
      let newRow = tableRef.insertRow(-1);

      // Insert a cell in the row at index 0
      let newCell = newRow.insertCell(0);
      let newCell1 = newRow.insertCell(1);
      let newCell2 = newRow.insertCell(2);
      let newCell3 = newRow.insertCell(3);
      let newCell4 = newRow.insertCell(4)
      let newCell5 = newRow.insertCell(5)
      // Append a text node to the cell
      noUrut += 1
      let newNo = document.createTextNode(noUrut);

      let newName = document.createTextNode(anggota.Nama);
      let newJabatan = document.createTextNode(anggota.Jabatan);
      let newNik = document.createTextNode(anggota.NIK);
      let newRegister = document.createTextNode( centang = (anggota.Register == "ya") ? "✅":"❌")
      let newCovid = document.createTextNode(centang1 = (anggota.Covid == "ya") ? "✅":"❌");
      newCell.appendChild(newNo);
      newCell1.appendChild(newName);
      newCell2.appendChild(newJabatan);
      newCell3.appendChild(newNik);
      newCell4.appendChild(newRegister);
      newCell5.appendChild(newCovid);
    }
    
    let tableRef2 = document.getElementById('permitBarangBawaan');
    let tabelHeader = `<tr>
    <th scope="col">No</th>
    <th scope="col">Name</th>
    <th scope="col">NIK</th>
    <th scope="col">Controlled Items</th>
    <th scope="col">SN</th>
  </tr>`
    if(data.bawaBarang == 'YA'){
      document.getElementById('permitBarangBawaan').innerHTML = tabelHeader
      var tableHeaderRowCount2 = 1;
      var rowCount2 = tableRef2.rows.length;
      for (var i = tableHeaderRowCount2; i < rowCount2; i++) {
          tableRef2.deleteRow(tableHeaderRowCount2);
      }
      let noUrut2 = 0
      for (barang of data.barangBawaan) {
      // Insert a row at the end of the table
        let newRow = tableRef2.insertRow(-1);

        // Insert a cell in the row at index 0
        let newCell = newRow.insertCell(0);
        let newCell1 = newRow.insertCell(1);
        let newCell2 = newRow.insertCell(2);
        let newCell3 = newRow.insertCell(3);
        let newCell4 = newRow.insertCell(4);

        
        // Append a text node to the cell
        noUrut2 += 1
        let newNo = document.createTextNode(noUrut2);

        let newName = document.createTextNode(barang['Nama Pemilik']);
        let newNik = document.createTextNode(barang['NIK']);
        let newItem = document.createTextNode(barang['Jenis Media']);
        let newDetail = document.createTextNode(barang.SN);
        
        newCell.appendChild(newNo);
        newCell1.appendChild(newName);
        newCell2.appendChild(newNik);
        newCell3.appendChild(newItem);
        newCell4.appendChild(newDetail);
    
      }
    } else{
      document.getElementById('permitBarangBawaan').innerHTML = '-'

    } 


  });
}

function reloadHalaman(){
  // if(Url == undefined){
  // window.location.href = '/';
  // } else{
  //   window.location.href = '/'+Url;
  // }
  window.location.reload()
}

function resetHalaman(){

 window.location.href = "/report";  
 
}

function updateLoc(id,loc) {
 
  fetch("/updatepermitlocation", {
    method: "POST",
    body: JSON.stringify({ id: id,location: loc}),
  }).then((_res) => {
    window.location.href = "/";
  });
}

function generatexls(id){
  fetch("/genxls", {
    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((_res) => {
    //window.open('visitoraproval.xlsx')
    window.location.href = "/static/VisitorApprovalBT.xlsx";
    //window.location.href = "/";
  });
}



function kirimEmailDecline() {
  let id = document.getElementById('idPermitReject').value
  let body = document.getElementById('emailBody').value
  fetch("/kirimemaildecline", {
    method: "POST",
    body: JSON.stringify({ id: id,body: body }),
  }).then((_res) => {
    window.location.reload()
  });
}

function getIdUpload(id){
  document.getElementById('idPermitUpload').value = id
  fetch("/permitdetail", {
    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((response) => {
    return response.json()
  }).then((data) => {
   
    document.getElementById("uploadGambarDbPermit").src = "data:image/png;base64,"+ data.uploadGambar;
    
    
    
    
  });

}

function viewUploadPermit(id){
  fetch("/permitdetail", {
    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((response) => {
    return response.json()
  }).then((data) => {
   
    document.getElementById("imgUploadPermit").src = "data:image/png;base64,"+ data.uploadGambar;
    
  });

}

function approveWorkingAdmin(id, empId){
  fetch("/approveworkingadmin", {
    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((response) => {
    fetch("/kirimemailapprovefromadmin", {
      method: "POST",
      body: JSON.stringify({ empId: empId , vendor: document.getElementById('permitDetailVendor').innerHTML, date: document.getElementById('permitDetailDate').innerHTML, purpose: document.getElementById('permitDetailPurpose').innerHTML}),    
    }).then((response) =>{
      window.location.reload() 
    })

  })
  
}

function approveOvertimeAdmin(id){
  fetch("/approveovertimeadmin", {
    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((response) => {
    return response.json()
  }).then((data) => { 
    window.location.reload()  
  });
}

function hostAccept(id){
  fetch("/accepthost", {
    method: "POST",
    body: JSON.stringify({ id: id }),
  }).then((response) => {
    return response.json()
  }).then((data) => { 
    fetch("/kirimemailapprove",{
      method: "POST",
      body: JSON.stringify({id: id})
    }).then((res) => {
      window.location.reload() 
    })
  })
}


function tombolCheckin(id){
  fetch("/waitinglist", {
    method: "POST",
    body: JSON.stringify({ tsid:id}),
  }).then((response) => {
    return response.json()
  }).then((data) => {

    window.location.reload()
    
})
}
function openModal() {
  var ugp = document.getElementById('uploadGambarPermit')
  ugp.style = "display: none;"
 
  
  var myModal = new bootstrap.Modal(document.getElementById('staticApprovalSuccess'), {  keyboard: false });
  myModal.show();
}
async function uploadPhotoPermit(){
  
  
  let idPermit = document.getElementById("idPermitUpload").value
  let formData = new FormData()
  formData.append("file",photoPermit.files[0])
  formData.append("idPermit",idPermit)
  const res = await fetch("/gambarpermit", {
    method: "POST",
    body: formData,
  })

  const data = await res.json()
  
  kirimEmailApprove(idPermit)
  
}

async function kirimEmailApprove(idPermit){
  const res = await fetch("/kirimemailapprove", {
    method: "POST",
    body: JSON.stringify({ id:idPermit }),
  })
  const hasil = await res.json()
  openModal()
}

function tutupSukses(){
  window.location.href = "/"
}

// tombol rubah tanggal di dashboard admin
function changeDate(){
 document.getElementById('gantiTanggal').submit()
 

}

function filterStatus(){
 
  document.getElementById('filterStatus').submit()
  // window.location.reload()
  // window.location.href = "/waiting"
}

function cariNama(){
 document.getElementById('cariNama').submit()
}

function cariStaff(){
  document.getElementById('cariStaff').submit()
 }