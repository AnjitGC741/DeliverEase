let idValue;
        function hideAll()
          {
            document.getElementById('blurBox').style.visibility="hidden";
            document.getElementById('addLocationBox').style.visibility="hidden";
            document.getElementById('addCuisineBox').style.visibility="hidden";
            document.getElementById("editFood_"+idValue).style.visibility = "hidden";
          }
          function showAddLocationBox()
          {
            document.getElementById('blurBox').style.visibility="visible";
            document.getElementById('addLocationBox').style.visibility="visible";
          }
          
          function showAddCuisineBox()
          {
            document.getElementById('blurBox').style.visibility="visible";
            document.getElementById('addCuisineBox').style.visibility="visible";
          }
          function showOrderFoodDetail(x)
          {
              idValue=x; 
              document.getElementById("editFood_"+x).style.visibility = "visible";
              document.getElementById('blurBox').style.visibility="visible";
          }
          function checkEmpty()
          {
            var locationName = document.getElementById("locationName").value;
            var locationImg = document.getElementById("locationImg").value;
            if(locationImg=="" || locationName=="")
            {
              document.getElementById("errorMessage").style.display="block";
            }
            else{
              addLocation.submit();
            }
          }
          function checkEmptyCusine()
          {
            var locationName = document.getElementById("cuisineName").value;
            var locationImg = document.getElementById("cuisineImg").value;
            if(locationImg=="" || locationName=="")
            {
              document.getElementById("errorMessage").style.display="block";
            }
            else{
              addLocation.submit();
            }
          }
          