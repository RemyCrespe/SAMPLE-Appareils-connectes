//
// function reload()
// {
//     var image = document.getElementById('video');
//
//     var xhttp = new XMLHttpRequest();
//
//     xhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             document.getElementById("video").innerHTML = "<img src=\"data:image/jpg;base64,'" + this.responseText + "'\" alt=\"Image\" />";
//             // document.getElementById("video").innerHTML = this.responseText;
//             console.log(this.responseText);
//         }
//     };
//
//     // xhttp.open("GET", "/home/camera/get", true);
//     xhttp.send();
//
// }

function reload()
{
    window.location = "/home/camera";
}