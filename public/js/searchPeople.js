const search = document.querySelector('input[placeholder="Search people"]');
const communityContainer = document.querySelector('.community');

search.addEventListener("keyup", function(event){
    if (event.key === "Enter") {
        event.preventDefault();
        const data = {search: this.value};
        fetch("/search_people", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response){
            return response.json();
        }).then(function (usersDetails) {
            communityContainer.innerHTML = "";
            loadUsers(usersDetails);
        });
    }
});

function loadUsers(usersData) {
    usersData.forEach(userData => {
        loadUser(userData);
    });
}

function loadUser(userData) {
    const template = document.querySelector("#user-template");
    const template_clone = template.content.cloneNode(true);
    const image = template_clone.querySelector("img");
    const name = template_clone.querySelector(".name");
    const bike = template_clone.querySelector(".bike-model span");
    const interest1 = template_clone.querySelector(".interest1");
    const interest2 = template_clone.querySelector(".interest2");
    const interest3 = template_clone.querySelector(".interest3");

    image.src = `/public/uploads/avatars/${userData.avatar}`;
    name.innerHTML = `${userData.name} ${userData.surname}`;
    bike.innerHTML = userData.bike;
    interest1.innerHTML = userData.interest1;
    interest2.innerHTML = userData.interest2;
    interest3.innerHTML = userData.interest3;

    communityContainer.appendChild(template_clone);
}