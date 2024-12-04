document.addEventListener("DOMContentLoaded", function () {
  // Lenis Smooth Scroll
  const lenis = new Lenis();

  // lenis.on('scroll', (e) => {
  //     console.log(e);
  //   });

  lenis.on("scroll", ScrollTrigger.update);

  gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
  });

  gsap.ticker.lagSmoothing(0);

  let header = new SplitType("#heroHeader");
  let sub = new SplitType("#heroSub");
  let navLinks = document.querySelectorAll(".nav-link");
  let mobileNav = document.querySelector(".mobile-nav");
  let openNav = document.querySelector(".burger");
  let exitNav = document.querySelector(".exit");
  let profile = document.querySelector("#profileImg");
  let options = document.querySelector("#options");

  // Home Animations

  gsap.from(header.chars, 1, {
    y: 130,
    stagger: 0.02,
    ease: "power3.inOut",
  });

  gsap.from(sub.chars, 1, {
    y: 130,
    stagger: 0.02,
    ease: "power3.inOut",
  });

  gsap.fromTo(
    "#visitBtn",
    1,
    {
      y: 150,
      scale: 0.9,
      opacity: 0,
      ease: "power2.out",
    },
    {
      y: 0,
      scale: 1,
      opacity: 1,
      ease: "power2.out",
    }
  );

  gsap.from(".burger", 1, {
    y: 10,
    opacity: 0,
    ease: "power1.inOut",
    delay: 0.8,
  });

  gsap.from(".profileImgContainer", 1, {
    opacity: 0,
    ease: "power1.inOut",
    delay: 1,
  });

  navLinks.forEach((el) => {
    let split = new SplitType(el);
    gsap.from(split.chars, 1, {
      y: 50,
      stagger: 0.03,
      ease: "power3.inOut",
      delay: 0.8,
    });
  });

  openNav.addEventListener("click", () => {
    mobileNav.classList.remove("-translate-x-full");
    mobileNav.classList.add("translate-x-0");
    document.body.classList.add("overflow-y-hidden");
    document.body.style.overflow = "hidden";
  });

  exitNav.addEventListener("click", () => {
    mobileNav.classList.remove("translate-x-0");
    mobileNav.classList.add("-translate-x-full");
    document.body.style.overflow = "auto";
  });

  profile.addEventListener("click", () => {
    if (options.style.display === "none" || options.style.display === "") {
      options.style.display = "flex";
    } else {
      options.style.display = "none";
    }
  });
});
