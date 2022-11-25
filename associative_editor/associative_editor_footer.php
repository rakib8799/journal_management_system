<footer class="main-footer w-100 position-absolute bottom-0 start-0 py-2 card_header">
        <div class="container-fluid">
          <div class="row text-center gy-3">
            <div class="col-sm-12 text-sm-start">
              <p class="mb-0 text-sm text-light text-center"><b>@Powered By: <i>Sumaiya Sharmin Shupty</i>, Dept of CSE</b></p>
            </div>
            
          </div>
        </div>
    </footer>
    </div>

 <!-- JavaScript files-->
 <script src="../framwork/bootstrap.bundle.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <script src="js/just-validate.min.js"></script>
  <script src="js/choices.min.js"></script>
  <script src="js/OverlayScrollbars.min.js"></script>
  <script src="js/charts-home.js"></script>
  <!-- Main File-->
  <script src="js/front.js"></script>
  <script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

      var ajax = new XMLHttpRequest();
      ajax.open("GET", path, true);
      ajax.send();
      ajax.onload = function (e) {
        var div = document.createElement("div");
        div.className = 'd-none';
        div.innerHTML = ajax.responseText;
        document.body.insertBefore(div, document.body.childNodes[0]);
      }
    }
    // this is set to BootstrapTemple website as you cannot
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
  </script>
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
</body>

</html>