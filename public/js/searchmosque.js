var finished;

window.onload=async()=>{
  try {
    const url = 'https://facemosque.com/api/api.php?client=app&cmd=mosque_list';

    
    const response = await fetch(url);
    const text = await response.text();
    console.log(text);

    let data1 = "[" + text.replaceAll("}", "},");
    let data = data1.slice(0, -2);
    finished = JSON.parse((data + "]"));
    console.log(finished);
    for (let i = 0; i < finished.length; i++) {
      var o = finished[i];
      console.log(o["mosque_id"]);
    }
  } catch (error) {
    console.log('An error occured')
    console.log(error)
  }
	
	var video = document.getElementById("video-back");
    var sources = video.getElementsByTagName("source");
	const videos = ["video2.mp4", "video1.mp4", "video3.mp4","video4.mp4","video5.mp4","video6.mp4"];
    const locations = [",Palestin, Makam Nabi Musa","Astana, Kazakhstan, The HASIRET SULTAN mosque", "Palestin, Makam Nabi Musa","Turkey, Istanbul, Süleymaniye Mosque","Palestin, Makam Nabi Musa","Turkey, Kıble Mountain Mosque"];
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
//const submitButton = document.getElementById('searchSubmit');

//submitButton.addEventListener("click", loadSearchData);
function openCity(cityName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(cityName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

function searchFilter() {
  const search = document.getElementById("searchvalue").value.toLowerCase();
	let listContainer = document.getElementById('list');
	let listItems = document.getElementsByClassName('listItem');
  const filtered = finished.filter(item => item.name.toLowerCase().includes(search));
  const list = document.getElementById("list");
	if(filtered){
  list.innerHTML = "";
  filtered.forEach(item => {
    const li = document.createElement("a");
    li.classList.add("list-group-item");
    //li.setAttribute('class','')
    li.innerHTML ="<a class=\"searchResultItem\" onclick=submitForm("+item.mosque_id+")><span class=\"fa-sharp fa-solid fa-mosque\"> </span>"+"  "+item.name.replaceAll('_',' ') + " - " + item.street+". "+item.house_no;
    list.appendChild(li);
  
  });
		}else{
		list.style.display="none";
		}
}

function labnolIframe(div) {
  var iframe = document.createElement('iframe');
  iframe.setAttribute('src', 'https://www.youtube.com/embed/' + div.dataset.id + '?autoplay=1&rel=0');
  iframe.setAttribute('frameborder', '0');
  iframe.setAttribute('allowfullscreen', '1');
  iframe.setAttribute('allow', 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture');
  div.parentNode.replaceChild(iframe, div);
}

function initYouTubeVideos() {
  var playerElements = document.getElementsByClassName('youtube-player');
  for (var n = 0; n < playerElements.length; n++) {
    var videoId = playerElements[n].dataset.id;
    var div = document.createElement('div');
    div.setAttribute('data-id', videoId);
    var thumbNode = document.createElement('img');
    thumbNode.src = '//i.ytimg.com/vi/ID/hqdefault.jpg'.replace('ID', videoId);
    div.appendChild(thumbNode);
    var playButton = document.createElement('div');
    playButton.setAttribute('class', 'play');
    div.appendChild(playButton);
    div.onclick = function () {
      labnolIframe(this);
    };
    playerElements[n].appendChild(div);
  }
}

document.addEventListener('DOMContentLoaded', initYouTubeVideos);


