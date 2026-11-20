/**
 * T.M. Hotel, Madurai — Motion & Scroll-Down Animation Engine
 * Uses GSAP 3 + ScrollTrigger when available, with resilient IntersectionObserver fallback.
 */

(function () {
  'use strict';

  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const isFinePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

  function initPreloader() {
    const preloader = document.getElementById('preloader');
    if (!preloader) return;

    const dismiss = () => {
      if (preloader.classList.contains('is-done')) return;
      preloader.classList.add('is-done');
      setTimeout(() => {
        preloader.setAttribute('aria-hidden', 'true');
        preloader.style.display = 'none';
      }, 900);
    };

    if (prefersReducedMotion) {
      dismiss();
      return;
    }

    if (document.readyState === 'complete') {
      setTimeout(dismiss, 700);
    } else {
      window.addEventListener('load', () => setTimeout(dismiss, 650), { once: true });
      setTimeout(dismiss, 2100);
    }
  }

  function initScrollProgressAndHeader() {
    const bar = document.getElementById('scrollProgress');
    const header = document.getElementById('siteHeader');
    const backTop = document.getElementById('backToTop');

    const onScroll = () => {
      const scrollY = window.scrollY || window.pageYOffset;
      const docHeight = document.documentElement.scrollHeight - window.innerHeight;
      const pct = docHeight > 0 ? Math.min(100, (scrollY / docHeight) * 100) : 0;

      if (bar) bar.style.width = `${pct.toFixed(2)}%`;
      if (header) header.classList.toggle('is-scrolled', scrollY > 40);
      if (backTop) backTop.classList.toggle('is-visible', scrollY > 480);
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    if (backTop) {
      backTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
      });
    }
  }

  function initCustomCursor() {
    if (!isFinePointer || prefersReducedMotion) return;
    const cursor = document.getElementById('customCursor');
    if (!cursor) return;

    let mouseX = -100;
    let mouseY = -100;
    let curX = -100;
    let curY = -100;

    document.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
      cursor.classList.add('is-visible');
    });

    document.addEventListener('mouseleave', () => {
      cursor.classList.remove('is-visible');
    });

    const tick = () => {
      curX += (mouseX - curX) * 0.22;
      curY += (mouseY - curY) * 0.22;
      cursor.style.left = `${curX}px`;
      cursor.style.top = `${curY}px`;
      requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);

    document.addEventListener('mouseover', (e) => {
      const labelEl = e.target.closest('[data-cursor]');
      const interactiveEl = e.target.closest('a, button, input, select, textarea');

      if (labelEl) {
        cursor.textContent = labelEl.getAttribute('data-cursor') || '';
        cursor.classList.add('is-label');
        cursor.classList.remove('is-hover');
      } else if (interactiveEl) {
        cursor.textContent = '';
        cursor.classList.add('is-hover');
        cursor.classList.remove('is-label');
      } else {
        cursor.textContent = '';
        cursor.classList.remove('is-hover', 'is-label');
      }
    });
  }

  function initMagneticButtons() {
    if (!isFinePointer || prefersReducedMotion) return;
    document.querySelectorAll('[data-magnetic]').forEach((btn) => {
      btn.addEventListener('mousemove', (e) => {
        const rect = btn.getBoundingClientRect();
        const x = (e.clientX - rect.left - rect.width / 2) * 0.22;
        const y = (e.clientY - rect.top - rect.height / 2) * 0.22;
        btn.style.transform = `translate3d(${x}px, ${y}px, 0)`;
      });
      btn.addEventListener('mouseleave', () => {
        btn.style.transform = '';
      });
    });
  }

  function initTiltCards() {
    if (!isFinePointer || prefersReducedMotion) return;
    document.addEventListener('mousemove', (e) => {
      const card = e.target.closest('.room-card, .amenity-card, .sight-card');
      if (!card) return;
      const rect = card.getBoundingClientRect();
      const px = (e.clientX - rect.left) / rect.width - 0.5;
      const py = (e.clientY - rect.top) / rect.height - 0.5;
      card.style.transform = `perspective(900px) rotateX(${(-py * 4.5).toFixed(2)}deg) rotateY(${(px * 4.5).toFixed(2)}deg) translateY(-6px)`;
    });

    document.addEventListener(
      'mouseleave',
      (e) => {
        if (
          e.target &&
          e.target.classList &&
          (e.target.classList.contains('room-card') ||
            e.target.classList.contains('amenity-card') ||
            e.target.classList.contains('sight-card'))
        ) {
          e.target.style.transform = '';
        }
      },
      true
    );
  }

  function animateCounter(el) {
    if (el.dataset.counted === 'true') return;
    el.dataset.counted = 'true';
    const target = parseInt(el.getAttribute('data-count') || '0', 10);
    const suffix = el.getAttribute('data-suffix') || '';
    const startVal = target > 1000 ? target - 60 : 0;

    if (prefersReducedMotion) {
      el.textContent = `${target}${suffix}`;
      return;
    }

    const duration = 1250;
    const startTime = performance.now();

    const step = (now) => {
      const progress = Math.min(1, (now - startTime) / duration);
      const eased = 1 - Math.pow(1 - progress, 3);
      const current = Math.round(startVal + (target - startVal) * eased);
      el.textContent = `${current}${suffix}`;
      if (progress < 1) {
        requestAnimationFrame(step);
      }
    };
    requestAnimationFrame(step);
  }

  let revealObserver = null;
  let curtainObserver = null;

  function setupObservers() {
    const revealEls = document.querySelectorAll('.reveal-up');
    const curtainEls = document.querySelectorAll('.image-curtain');
    const counterEls = document.querySelectorAll('[data-count]');

    if (prefersReducedMotion) {
      revealEls.forEach((el) => el.classList.add('is-revealed'));
      curtainEls.forEach((el) => el.classList.add('is-curtain-open'));
      counterEls.forEach(animateCounter);
      return;
    }

    revealObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const delay = entry.target.getAttribute('data-delay');
            if (delay) entry.target.style.transitionDelay = `${delay}ms`;
            entry.target.classList.add('is-revealed');
            revealObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.08, rootMargin: '0px 0px -30px 0px' }
    );

    curtainObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-curtain-open');
            curtainObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1 }
    );

    revealEls.forEach((el) => revealObserver.observe(el));
    curtainEls.forEach((el) => curtainObserver.observe(el));

    const counterObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            counterObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.3 }
    );
    counterEls.forEach((el) => counterObserver.observe(el));
  }

  function initGsapScrollChoreography() {
    if (prefersReducedMotion || !window.gsap || !window.ScrollTrigger) return;

    const gsap = window.gsap;
    gsap.registerPlugin(window.ScrollTrigger);

    // Hero entrance stagger
    if (document.querySelector('.hero__animate')) {
      gsap.from('.hero__animate', {
        y: 42,
        opacity: 0,
        duration: 0.95,
        stagger: 0.11,
        ease: 'power3.out',
        delay: 0.35
      });
    }

    // Subpage banner entrance
    if (document.querySelector('.page-banner__inner')) {
      gsap.from('.page-banner__inner > *', {
        y: 30,
        opacity: 0,
        duration: 0.8,
        stagger: 0.09,
        ease: 'power3.out'
      });
    }

    // Scroll-scrubbed parallax on hero and subpage banners
    const heroImg = document.querySelector('.hero__img');
    if (heroImg) {
      gsap.to(heroImg, {
        yPercent: 18,
        ease: 'none',
        scrollTrigger: {
          trigger: '.hero',
          start: 'top top',
          end: 'bottom top',
          scrub: true
        }
      });
    }

    const bannerBg = document.querySelector('.page-banner__bg');
    if (bannerBg) {
      gsap.to(bannerBg, {
        yPercent: 22,
        ease: 'none',
        scrollTrigger: {
          trigger: '.page-banner',
          start: 'top top',
          end: 'bottom top',
          scrub: true
        }
      });
    }

    // Floating 1950 heritage badge smooth scroll float
    const floatCard = document.querySelector('.heritage-floating-card');
    if (floatCard) {
      gsap.fromTo(
        floatCard,
        { y: 24 },
        {
          y: -24,
          ease: 'none',
          scrollTrigger: {
            trigger: '#heritage',
            start: 'top bottom',
            end: 'bottom top',
            scrub: true
          }
        }
      );
    }
  }

  window.TMAnimations = {
    init: function () {
      initPreloader();
      initScrollProgressAndHeader();
      initCustomCursor();
      initMagneticButtons();
      initTiltCards();
      setupObservers();
      initGsapScrollChoreography();
    },
    refreshReveals: function () {
      document.querySelectorAll('.reveal-up:not(.is-revealed)').forEach((el) => {
        if (revealObserver) revealObserver.observe(el);
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight * 0.96) {
          el.classList.add('is-revealed');
        }
      });
      document.querySelectorAll('.image-curtain:not(.is-curtain-open)').forEach((el) => {
        if (curtainObserver) curtainObserver.observe(el);
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight * 0.96) {
          el.classList.add('is-curtain-open');
        }
      });
    }
  };
})();
