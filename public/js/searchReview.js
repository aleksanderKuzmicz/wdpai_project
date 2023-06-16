const search = document.querySelector('input[placeholder="Search reviews"]');
const reviewContainer = document.querySelector('.reviews');

search.addEventListener("keyup", function(event) {
    if(event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};
        fetch("/search_review", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (reviews) {
            reviewContainer.innerHTML = "";
            loadReviews(reviews);
        });
    }
});

function loadReviews(reviews) {
    reviews.forEach(review => {
        createReview(review);
    });
}

function createReview(review) {
    const template = document.querySelector("#review-template");
    const template_clone = template.content.cloneNode(true);

    const image = template_clone.querySelector("img");
    image.src = `/public/uploads/${review.image}`;
    const title = template_clone.querySelector("h2");
    title.innerHTML = review.title;
    const description = template_clone.querySelector("p");
    description.innerHTML = review.description;
    const like = template_clone.querySelector(".fa\-heart span");
    like.innerHTML = review.likes_number;
    // const dislike = template_clone.querySelector(".fa\-square-minus span");
    // dislike.innerHTML = review.dislikes_number;

    reviewContainer.appendChild(template_clone);
}
