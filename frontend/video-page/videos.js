fetch("/Netfish/backend/Domain/videos/ListVideos.php")
  .then(res => res.json())
  .then(videos => {
      console.log(videos); // <-- Add this to see what the JS receives

      const container = document.getElementById("videos");

      if (!videos.length) {
          container.innerHTML = "<p>No videos found</p>";
          return;
      }

      videos.forEach(video => {
          const div = document.createElement("div");
          div.style.marginBottom = "40px";
          div.innerHTML = `
              <h2>${video.title}</h2>
              <p>${video.description}</p>
              <video width="480" controls>
                  <source src="${video.url}" type="video/mp4">
              </video>
              <p><small>${video.year}</small></p>
          `;
          container.appendChild(div);
      });
  });
