
    let idValue;
    function toggleMenu() {
        let subMenu = document.getElementById("subMenu");
        subMenu.classList.toggle("open-menu");
    }

    function removeFromFavorite() {
        var formData = $('#removeFromFavorite').serialize();
        $.ajax({
            url: '{{ route("remove-from-favorite") }}',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                alert(response.message);
                location.reload()
            }

        });
    }

    function showProfile() {
        document.getElementById("userProfile").style.display = "block";
        document.getElementById("userFavorite").style.display = "none";
        document.getElementById("userHistory").style.display = "none";
        document.getElementById("myOrder").style.display = "none";
        document.getElementById("show-profile-btn").classList.add("active1");
        document.getElementById("show-favorite-btn").classList.remove("active1");
        document.getElementById("show-history-btn").classList.remove("active1");
        document.getElementById("show-order-btn").classList.remove("active1");

    }

    function showFavorite() {
        document.getElementById("userProfile").style.display = "none";
        document.getElementById("userFavorite").style.display = "block";
        document.getElementById("userHistory").style.display = "none";
        document.getElementById("myOrder").style.display = "none";
        document.getElementById("show-profile-btn").classList.remove("active1");
        document.getElementById("show-favorite-btn").classList.add("active1");
        document.getElementById("show-history-btn").classList.remove("active1");
        document.getElementById("show-order-btn").classList.remove("active1");

    }

    function showHistory() {
        document.getElementById("userProfile").style.display = "none";
        document.getElementById("userFavorite").style.display = "none";
        document.getElementById("userHistory").style.display = "block";
        document.getElementById("myOrder").style.display = "none";
        document.getElementById("show-profile-btn").classList.remove("active1");
        document.getElementById("show-favorite-btn").classList.remove("active1");
        document.getElementById("show-history-btn").classList.add("active1");
        document.getElementById("show-order-btn").classList.remove("active1");

    }
    function showMyOrder() {
        document.getElementById("userProfile").style.display = "none";
        document.getElementById("userFavorite").style.display = "none";
        document.getElementById("userHistory").style.display = "none";
        document.getElementById("myOrder").style.display = "block";
        document.getElementById("show-profile-btn").classList.remove("active1");
        document.getElementById("show-favorite-btn").classList.remove("active1");
        document.getElementById("show-history-btn").classList.remove("active1");
        document.getElementById("show-order-btn").classList.add("active1");
    }

    function hideAll() {
        document.getElementById('blurBox').style.visibility = "hidden";
        document.getElementById("editFood_" + idValue).style.visibility = "hidden";
    }

    function showOrderFoodDetail(x) {
        idValue = x;
        document.getElementById("editFood_" + x).style.visibility = "visible";
        document.getElementById('blurBox').style.visibility = "visible";
    }

    function makeEditable() {
        document.getElementById("customerName").removeAttribute("readonly");
        document.getElementById("customerNumber").removeAttribute("readonly");
        document.getElementById("edit-btn").style.display = "none";
        document.getElementById("saveCancelBtn").style.visibility = "visible";
    }

    function cancel() {
        document.getElementById("edit-btn").style.display = "block";
        document.getElementById("saveCancelBtn").style.visibility = "hidden";
        document.getElementById("customerName").setAttribute("readonly", false);
        document.getElementById("customerNumber").setAttribute("readonly", false);
    }