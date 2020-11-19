const header = document.querySelector(".navHeader");
const sectionOne = document.querySelector("#bookingForm");

const sectionOneOptions = {
    rootMargin: "200px 0px 0px 0px"
};

const sectionOneObserver = new IntersectionObserver(function(
        entries,
        sectionOneObserver
    ) {
        entries.forEach(entry => {
            console.log(entry.target);
            if (!entry.isIntersecting) {
                header.classList.add("show");
            } else {
                header.classList.remove("show");
            }
        });
    },
    sectionOneOptions);

sectionOneObserver.observe(sectionOne);