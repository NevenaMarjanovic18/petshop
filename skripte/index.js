$(document).ready(function () {
  let kategorije = document.getElementsByClassName("sveKategorije")[0];
  let proizvodi = document.getElementsByClassName("proizvodi")[0];
  let searchBar = document.getElementsByClassName("pretrazi")[0];

  $.ajax({
    url: "operacije/proizvodi/vrati_kategorije.php",
    type: "POST",
    success: function (vraceneKategorije) {
      if (!vraceneKategorije.error) {
        kategorije.innerHTML = vraceneKategorije;
      }
    },
  });

  $.ajax({
    url: "operacije/proizvodi/vrati_proizvode.php",
    type: "POST",
    success: function (vraceniProizvodi) {
      if (!vraceniProizvodi.error) {
        proizvodi.innerHTML = vraceniProizvodi;
      }
    },
  });

  $(".sveKategorije").on("click", ".kategorija", function () {
    let id = this.id;
    $.ajax({
      url: "operacije/proizvodi/vrati_proizvode_po_kategoriji.php",
      type: "POST",
      data: { id: id },
      success: function (vraceniProizvodi) {
        if (!vraceniProizvodi.error) {
          proizvodi.innerHTML = vraceniProizvodi;
        }
      },
    });
  });

  searchBar.addEventListener("keyup", function () {
    var search = $(".pretrazi").val();
    console.log(search);
    $.ajax({
      url: "operacije/proizvodi/pretrazi_proizvode.php",
      //prosledjujemo preko kljuca search atribut search
      data: { search: search },
      type: "POST",
      success: function (vraceniProizvodi) {
        //ako nema greske onda u result ubacimo data koji je vracen
        if (!vraceniProizvodi.error) {
          proizvodi.innerHTML = vraceniProizvodi;
          if (vraceniProizvodi == "") {
            $.ajax({
              url: "operacije/proizvodi/vrati_proizvode.php",
              type: "POST",
              success: function (vraceni) {
                if (!vraceni.error) {
                  proizvodi.innerHTML = vraceni;
                }
              },
            });
          }
        }
      },
    });
  });

  $(".proizvodi").on('click','.dodajUKorpu', function(){
    let id=this.id;
     console.log(id);
        $.ajax({
            url:'operacije/korpa/dodaj_u_korpu.php',
            type:'POST',
            data:{id:id}
        });
    }); 

    $(".proizvodi").on('click','.izmeni', function(){
      let id=this.id;
          $.ajax({
              url:'operacije/proizvodi/vrati_proizvod.php',
              type:'POST',
              data:{id:id},
              success:function(proizvod){
              if(!proizvod.error){
                  console.log('vratio');
                  $('.forme').html(proizvod);
              }
          }
          });
      });

      $(".proizvodi").on('click','.obrisi', function(){
        let id=this.id;
            $.ajax({
                url:'operacije/proizvodi/obrisi_proizvod.php',
                type:'POST',
                data:{id:id},
                success:function(){
                    location.reload();
            }
            });
        });
});
