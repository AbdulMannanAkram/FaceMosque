window.onload = function() {
    const videos = ["video1.mp4", "video2.mp4", "video3.mp4","video4.mp4","video5.mp4","video6.mp4"];
    const locations = ["Astana, Kazakhstan, The HASIRET SULTAN mosque", ",Palestin, Makam Nabi Musa", "Palestin, Makam Nabi Musa","Turkey, Istanbul, Süleymaniye Mosque","Palestin, Makam Nabi Musa","Turkey, Kıble Mountain Mosque"];

// get a random index from the videos array

// get the video element

// set the video source to the randomly selected video
    
    var video = document.getElementById("video-back");
    var sources = video.getElementsByTagName("source");
    var randomIndex = Math.floor(Math.random() * videos.length);
    var location= document.getElementById("mosque-location")
    var f=document.createElement('i');
    f.setAttribute('class','custom-icon bi-geo-alt me-2');
    //location.appendChild(f);
    location.innerHTML='<i class="custom-icon bi-geo-alt me-2"></i>'+locations[randomIndex];
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();    
    document.getElementById("date-now").innerHTML='<i class="custom-icon bi-clock me-2"></i>'+date;
    //var source = sources[randomIndex].getAttribute("src");
    video.setAttribute("src",  `video/${videos[randomIndex]}`);
    video.load();
  }