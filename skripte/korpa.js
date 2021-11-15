$(document).ready(function () {
  $("#cartDiv").on("click", ".remove", function () {
    let id = this.id;
    $.ajax({
      url: "operacije/korpa/obrisi_iz_korpe.php",
      type: "GET",
      data: { id: id },
      success: function () {
        location.reload();
      },
    });
  });

  $(".naruci").on('click', function(){
    let ime=document.getElementById("ime").value;
    let prezime=document.getElementById("prezime").value;
    let adresa=document.getElementById("adresa").value;
        $.ajax({
            url:'operacije/narudzbine/dodaj_narudzbinu.php',
            type:'POST',
            data:{ime:ime, prezime:prezime, adresa:adresa},
            success:function(){
                location.replace('http://localhost/petshop/index.html')
        }
        });
    }); 
});
