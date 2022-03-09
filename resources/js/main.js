const replyBtns = document.querySelectorAll(".reply-btn");

replyBtns.forEach((btn) => {
    const formComment = btn.parentNode.querySelector("form");

    btn.addEventListener("click", (e) => {
        e.preventDefault();
        formComment.classList.toggle("hide");
    });
});
