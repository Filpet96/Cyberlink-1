var deletePost = document.querySelector(".delete-post");
replayGame.addEventListener("click", delete_post);


function delete_post() {
   // var prompt = prompt("Are you sure you wanna delete this post?")
   window.confirm('Are you sure you wanna delete this post?');
}


var playGame = document.querySelector(".play");
playGame.addEventListener("click", play);

function edit_post() {
   document.querySelector(".edit-post").classList.remove("x-index");
   document.querySelector(".edit-post").classList.add("z-index");

}

function save_changes() {
   document.querySelector(".edit-title").classList.add("x-index");
}
