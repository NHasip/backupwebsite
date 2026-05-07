(function () {
  'use strict';

  const pages = [
    { href: 'index.html',        label: 'Home' },
    { href: 'abonnementen.html', label: 'Abonnementen' },
    { href: 'werkwijze.html',    label: 'Werkwijze' },
    { href: 'artsroute.html',    label: 'Arts-route' },
    { href: 'tarieven.html',     label: 'Tarieven' },
    { href: 'overons.html',      label: 'Over ons' },
    { href: 'faq.html',          label: 'FAQ' },
  ];

  const arrowSVG = `<svg class="arr" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>`;

  const cur = window.location.pathname.split('/').pop() || 'index.html';

  /* ── NAV HTML ──────────────────────────────── */
  const navHTML = `
<nav id="mainNav" role="navigation" aria-label="Hoofdnavigatie">
  <div class="nav-inner">
    <a href="index.html" class="nav-logo" aria-label="Bac-kup – terug naar home">
      <img src="logo.png" alt="Bac-kup" class="nav-logo-img">
    </a>
    <ul class="nav-links" role="list">
      ${pages.map(p => `<li><a href="${p.href}"${cur === p.href ? ' class="active" aria-current="page"' : ''}>${p.label}</a></li>`).join('')}
      <li><a href="contact.html" class="nav-cta${cur === 'contact.html' ? ' active' : ''}">Plan kennismaking</a></li>
    </ul>
    <button class="nav-ham" id="navHam" aria-label="Menu openen" aria-expanded="false" aria-controls="mobMenu">
      <svg id="hamIcon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
        <line x1="3" y1="6" x2="21" y2="6"/>
        <line x1="3" y1="12" x2="21" y2="12"/>
        <line x1="3" y1="18" x2="21" y2="18"/>
      </svg>
    </button>
  </div>
</nav>
<div class="mob-menu" id="mobMenu" role="dialog" aria-label="Navigatiemenu" aria-modal="true">
  <div class="mob-overlay" id="mobOverlay"></div>
  <div class="mob-panel">
    <ul class="mob-links" role="list">
      ${pages.map(p => `<li><a href="${p.href}"${cur === p.href ? ' class="active" aria-current="page"' : ''}>${p.label}${arrowSVG}</a></li>`).join('')}
    </ul>
    <div class="mob-divider"></div>
    <a href="contact.html" class="mob-cta">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.42 2 2 0 0 1 3.6 1.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9a16 16 0 0 0 6 6l.92-.91a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      Plan kennismaking
    </a>
  </div>
</div>`;

  /* ── FOOTER HTML ───────────────────────────── */
  const footerHTML = `
<footer>
  <div class="footer-wrap">
    <div class="footer-grid">
      <div>
        <a href="index.html" class="footer-logo-link" aria-label="Bac-kup home">
          <img src="logo.png" alt="Bac-kup" class="footer-logo-img">
        </a>
        <p class="ftr-tagline">Procesregie voor het MKB. Helder, schaalbaar en zonder onnodige lagen.</p>
        <p class="ftr-disclaimer">Bac-kup levert procesondersteuning en verwerkt geen medische gegevens. Werkgever blijft verantwoordelijk voor regie en UWV-dossieropbouw.</p>
      </div>
      <div>
        <span class="ftr-col-title">Diensten</span>
        <ul class="ftr-links">
          <li><a href="abonnementen.html">Abonnementen</a></li>
          <li><a href="werkwijze.html">Werkwijze</a></li>
          <li><a href="artsroute.html">Basiscontract &amp; arts-route</a></li>
          <li><a href="tarieven.html">Tarieven (BAC)</a></li>
        </ul>
      </div>
      <div>
        <span class="ftr-col-title">Bedrijf</span>
        <ul class="ftr-links">
          <li><a href="overons.html">Over ons</a></li>
          <li><a href="faq.html">FAQ</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </div>
      <div>
        <span class="ftr-col-title">Legal</span>
        <ul class="ftr-links">
          <li><a href="privacyverklaring.html">Privacyverklaring</a></li>
          <li><a href="cookieverklaring.html">Cookieverklaring</a></li>
          <li><a href="disclaimer.html">Disclaimer</a></li>
          <li><a href="klachtenregeling.html">Klachtenregeling</a></li>
          <li><a href="algemene-voorwaarden.html">Algemene voorwaarden</a></li>
          <li><a href="colofon.html">Colofon</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span class="ftr-copy">© Bac-kup B.V. — Anne Frankstraat 35, 2548LA 's-Gravenhage — KvK 99878232</span>
      <span class="ftr-copy">origo.care · Geen tracking · Geen advertenties</span>
    </div>
  </div>
</footer>`;

  /* ── INJECT ────────────────────────────────── */
  // Insert nav as FIRST child of body — this is correct, body already has
  // padding-top: var(--nav-h) via shared.css so content below nav is visible
  document.body.insertAdjacentHTML('afterbegin', navHTML);
  document.body.insertAdjacentHTML('beforeend', footerHTML);

  /* ── NAV SCROLL SHADOW ─────────────────────── */
  const nav = document.getElementById('mainNav');
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 20);
  }, { passive: true });

  /* ── MOBILE MENU ───────────────────────────── */
  const ham     = document.getElementById('navHam');
  const menu    = document.getElementById('mobMenu');
  const overlay = document.getElementById('mobOverlay');
  const hamIcon = document.getElementById('hamIcon');

  const ICON_CLOSE = `<line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>`;
  const ICON_OPEN  = `<line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>`;

  function setMenu(open) {
    menu.classList.toggle('open', open);
    ham.setAttribute('aria-expanded', String(open));
    ham.setAttribute('aria-label', open ? 'Menu sluiten' : 'Menu openen');
    hamIcon.innerHTML = open ? ICON_CLOSE : ICON_OPEN;
    document.body.style.overflow = open ? 'hidden' : '';
  }

  ham.addEventListener('click', () => setMenu(!menu.classList.contains('open')));
  overlay.addEventListener('click', () => setMenu(false));
  menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => setMenu(false)));
  document.addEventListener('keydown', e => { if (e.key === 'Escape') setMenu(false); });

  /* ── SCROLL REVEAL ─────────────────────────── */
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        io.unobserve(e.target); // stop observing once visible
      }
    });
  }, { threshold: .07 });
  document.querySelectorAll('.reveal').forEach(el => io.observe(el));

  /* ── LEGAL TOC HIGHLIGHT ───────────────────── */
  const tocLinks = document.querySelectorAll('.toc-list a');
  if (tocLinks.length) {
    const sections = document.querySelectorAll('.legal-section[id]');
    const onScroll = () => {
      let current = '';
      const offset = window.innerHeight * 0.25;
      sections.forEach(s => {
        if (s.getBoundingClientRect().top <= offset) current = s.id;
      });
      tocLinks.forEach(a => {
        a.classList.toggle('active', a.getAttribute('href') === '#' + current);
      });
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // run on load
  }

})();
