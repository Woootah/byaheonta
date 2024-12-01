let header = new SplitType("#heroHeader");
let sub = new SplitType("#heroSub");
let navLinks = document.querySelectorAll(".nav-link");
let mobileNav = document.querySelector(".mobile-nav")
let openNav = document.querySelector(".burger");
let exitNav = document.querySelector(".exit");

// Home Animations

gsap.from(header.chars, 1, {
    y: 130,
    stagger: 0.02,
    ease: "power3.inOut",
})

gsap.from(sub.chars, 1, {
    y: 130,
    stagger: 0.02,
    ease: "power3.inOut",
})

gsap.from("#visitBtn", 1, {
    y:50,
    opacity: 0,
    ease: "power1.inOut",
    }
)

gsap.from(".burger", 1, {
    y:10,
    opacity: 0,
    ease: "power1.inOut",
    delay: 0.8
    }
)

navLinks.forEach(el => {
    let split = new SplitType(el);
    gsap.from(split.chars, 1, {
        y: 50,
        stagger: 0.03,
        ease: "power3.inOut",
        delay: 0.8
    })
})

openNav.addEventListener("click", () => {
    mobileNav.classList.remove("-translate-x-full");
    mobileNav.classList.add("translate-x-0");
})

exitNav.addEventListener("click", () => {
    mobileNav.classList.remove("translate-x-0");
    mobileNav.classList.add("-translate-x-full");
})
