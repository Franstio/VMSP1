$(document).ready(function(){
    var table = $('#dataTable').DataTable();

    //display Edit Modal
    $('.edit_btn').on('click', function(){
        

        var id = $(this).parent().prev().prev().prev().prev().text();
        var nameVendor = $(this).parent().prev().prev().prev().text();
        var asalVendor = $(this).parent().prev().prev().text();
        var email = $(this).parent().prev().text();
        var namaVisitor = $(this).parent().prev().text();
        var nik = $(this).parent().prev().text();
        var gender = $(this).parent().prev().text();
        var jabatan = $(this).parent().prev().text();

            $('#nameVendor').val(nameVendor);
            $('#asalVendor').val(asalVendor);
            $('#email').val(email);
            $('#namaVisitor').val(namaVisitor);
            $('#nik').val(nik);
            $('#gender').val(gender);
            $('#jabatan').val(jabatan);
        
            $('#editForm').attr('action', '/visitor/' + data[0]);
            $('#editModal').modal('show');
    })
    
});