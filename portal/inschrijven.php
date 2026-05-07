<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inschrijven — Bac-kup</title>
<meta name="robots" content="noindex, nofollow">
<link rel="icon" type="image/png" href="/img/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/svg+xml" href="/img/favicon.svg">
<link rel="shortcut icon" href="/img/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap">
<link rel="stylesheet" href="/shared.css">
<style>
.reg-hero { background: var(--green); padding: 52px var(--px) 44px; }
.reg-hero-inner { max-width: 760px; margin: 0 auto; }
.reg-hero .ph-eye { font-size:.62rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--teal-lt);margin-bottom:.55rem; }
.reg-hero h1 { font-family:'Playfair Display',serif;font-size:clamp(1.7rem,4vw,2.6rem);font-weight:900;color:#fff;line-height:1.12;margin-bottom:.6rem; }
.reg-hero h1 em { font-style:normal;color:var(--mint); }
.reg-hero-lead { font-size:.93rem;color:rgba(255,255,255,.6);line-height:1.75; }
.steps-bar { display:flex;align-items:center;gap:8px;margin-top:1.6rem; }
.step-dot { width:8px;height:8px;border-radius:50%;background:rgba(255,255,255,.25);transition:all .2s; }
.step-dot.active { background:var(--mint);width:24px;border-radius:4px; }
.step-label { font-size:.72rem;color:rgba(255,255,255,.45);margin-left:4px; }
.reg-section { background:var(--cream);padding:48px var(--px); }
.reg-card { max-width:760px;margin:0 auto;background:var(--white);border-radius:var(--r);padding:2.4rem;box-shadow:var(--shadow-sm);border:1px solid rgba(168,212,204,.2); }
.form-section { margin-bottom:2rem; }
.form-section + .form-section { padding-top:2rem;border-top:1px solid rgba(168,212,204,.18); }
.form-section-title { font-size:.65rem;font-weight:700;text-transform:uppercase;letter-spacing:.14em;color:var(--teal);margin-bottom:1.2rem;display:flex;align-items:center;gap:8px; }
.form-section-title::before { content:'';width:16px;height:2px;background:var(--teal);border-radius:2px;flex-shrink:0; }
.form-grid { display:grid;grid-template-columns:1fr 1fr;gap:1rem; }
.form-grid .span2 { grid-column:span 2; }
@media(max-width:560px){ .form-grid{grid-template-columns:1fr} .form-grid .span2{grid-column:span 1} }
.field { display:flex;flex-direction:column;gap:5px; }
.field label { font-size:.78rem;font-weight:600;color:var(--ink-mid); }
.field label .req { color:var(--teal);margin-left:2px; }
.field input, .field select, .field textarea {
  width:100%;padding:.72rem 1rem;border:1.5px solid rgba(168,212,204,.4);border-radius:10px;
  font-family:'DM Sans',sans-serif;font-size:.88rem;color:var(--ink);background:var(--white);
  transition:border-color .2s,box-shadow .2s;outline:none;
}
.field input:focus, .field select:focus, .field textarea:focus {
  border-color:var(--teal);box-shadow:0 0 0 3px rgba(61,140,122,.1);
}
.field input.error, .field select.error { border-color:var(--danger); }
.field-hint { font-size:.72rem;color:var(--ink-lt);margin-top:2px; }
.sub-grid { display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:1rem;margin-bottom:1.4rem; }
.sub-card { border:2px solid rgba(168,212,204,.3);border-radius:16px;padding:1.4rem;cursor:pointer;transition:border-color .2s,box-shadow .2s,transform .18s;position:relative;background:var(--white); }
.sub-card:hover { border-color:var(--teal-lt);transform:translateY(-2px);box-shadow:var(--shadow-xs); }
.sub-card.selected { border-color:var(--teal);box-shadow:0 0 0 3px rgba(61,140,122,.12); }
.sub-card input[type="radio"] { position:absolute;opacity:0;width:0;height:0; }
.sub-check { position:absolute;top:1rem;right:1rem;width:20px;height:20px;border-radius:50%;border:2px solid rgba(168,212,204,.4);display:flex;align-items:center;justify-content:center;transition:all .2s; }
.sub-card.selected .sub-check { background:var(--teal);border-color:var(--teal); }
.sub-card.selected .sub-check svg { display:block; }
.sub-check svg { display:none;color:#fff; }
.sub-name { font-weight:700;font-size:.95rem;color:var(--ink);margin-bottom:.2rem; }
.sub-short { font-size:.78rem;color:var(--ink-lt);line-height:1.5;margin-bottom:.9rem; }
.sub-price-n { font-family:'Playfair Display',serif;font-size:1.6rem;font-weight:900;color:var(--green);line-height:1; }
.sub-price-u { font-size:.68rem;color:var(--ink-lt); }
.sub-detail-panel { background:var(--mint-pale);border-radius:14px;padding:1.4rem 1.6rem;border:1px solid rgba(61,140,122,.18);margin-bottom:1.4rem;display:none; }
.sub-detail-panel.show { display:block; }
.sub-detail-title { font-weight:700;font-size:.9rem;color:var(--ink);margin-bottom:.7rem; }
.sub-detail-desc { font-size:.85rem;color:var(--ink-mid);line-height:1.75;margin-bottom:1rem; }
.sub-features { list-style:none;display:flex;flex-direction:column;gap:.45rem; }
.sub-features li { display:flex;align-items:flex-start;gap:8px;font-size:.83rem;color:var(--ink-mid); }
.sub-features li svg { flex-shrink:0;color:var(--teal);margin-top:2px; }
.price-calc { background:var(--green);border-radius:14px;padding:1.2rem 1.5rem;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.75rem; }
.price-calc-label { font-size:.82rem;color:rgba(255,255,255,.65); }
.price-calc-amount { font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:900;color:var(--mint); }
.price-calc-sub { font-size:.7rem;color:rgba(255,255,255,.4); }
.terms-row { display:flex;align-items:flex-start;gap:.75rem;padding:1rem;background:var(--cream);border-radius:10px; }
.terms-row input[type="checkbox"] { margin-top:3px;width:18px;height:18px;flex-shrink:0;accent-color:var(--teal); }
.terms-row label { font-size:.82rem;color:var(--ink-mid);line-height:1.6; }
.terms-row a { color:var(--teal);text-decoration:underline; }
.error-box { display:none;background:#fef2f2;border:1px solid #fca5a5;border-radius:10px;padding:1rem 1.2rem;margin-bottom:1.4rem; }
.error-box.show { display:block; }
.error-box ul { list-style:none; }
.error-box li { font-size:.83rem;color:#c47a6a;padding:.15rem 0;display:flex;align-items:flex-start;gap:6px; }
.error-box li::before { content:'✕';flex-shrink:0; }
.submit-row { display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;margin-top:1.6rem;padding-top:1.4rem;border-top:1px solid rgba(168,212,204,.18); }
.submit-note { font-size:.75rem;color:var(--ink-lt);max-width:320px;line-height:1.55; }
.btn-submit,.btn-secondary { background:var(--green);color:#fff;border:none;padding:.9rem 2.2rem;border-radius:100px;font-family:'DM Sans',sans-serif;font-size:.9rem;font-weight:700;cursor:pointer;display:inline-flex;align-items:center;gap:8px;transition:all .22s;min-height:52px; }
.btn-secondary { background:transparent;border:1.5px solid rgba(61,140,122,.45);color:var(--teal); }
.btn-submit:hover { background:var(--teal);transform:translateY(-2px);box-shadow:0 8px 24px rgba(61,140,122,.28); }
.btn-secondary:hover { border-color:var(--teal);background:rgba(61,140,122,.08); }
.step-pane { display:none; }
.step-pane.active { display:block; }
.review-grid { display:grid;grid-template-columns:1fr 1fr;gap:1rem; }
.review-item { background:var(--cream);border-radius:10px;padding:.9rem 1rem;border:1px solid rgba(168,212,204,.3); }
.review-key { display:block;font-size:.72rem;color:var(--ink-lt);margin-bottom:.2rem;text-transform:uppercase;letter-spacing:.08em; }
.review-value { font-size:.9rem;color:var(--ink);font-weight:600;word-break:break-word; }
.success-box { display:none;background:#ecfdf5;border:1px solid #86efac;border-radius:12px;padding:1rem 1.2rem;margin-bottom:1.4rem;color:#166534;font-size:.88rem; }
.success-box.show { display:block; }
@media(max-width:560px){ .review-grid{grid-template-columns:1fr} }
</style>
</head>
<body>
<nav id="mainNav" role="navigation" aria-label="Hoofdnavigatie">
  <div class="nav-inner">
    <a href="/" class="nav-logo" aria-label="Bac-kup terug naar home">
      <img src="/wp-content/themes/bac-kup-origo/assets/img/logo-origo.png" alt="Bac-kup" class="nav-logo-img">
    </a>
    <ul class="nav-links" role="list">
      <li><a href="/">Home</a></li>
      <li><a href="/abonnementen/">Abonnementen</a></li>
      <li><a href="/werkwijze/">Werkwijze</a></li>
      <li><a href="/artsroute/">Arts-route</a></li>
      <li><a href="/tarieven/">Tarieven</a></li>
      <li><a href="/overons/">Over ons</a></li>
      <li><a href="/faq/">FAQ</a></li>
      <li><a href="/contact/" class="nav-cta">Plan kennismaking</a></li>
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
      <li><a href="/">Home<svg class="arr" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a></li>
      <li><a href="/abonnementen/">Abonnementen<svg class="arr" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a></li>
      <li><a href="/werkwijze/">Werkwijze<svg class="arr" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a></li>
      <li><a href="/artsroute/">Arts-route<svg class="arr" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a></li>
      <li><a href="/tarieven/">Tarieven<svg class="arr" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a></li>
      <li><a href="/overons/">Over ons<svg class="arr" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a></li>
      <li><a href="/faq/">FAQ<svg class="arr" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a></li>
    </ul>
    <div class="mob-divider"></div>
    <a href="/contact/" class="mob-cta">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.42 2 2 0 0 1 3.6 1.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9a16 16 0 0 0 6 6l.92-.91a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      Plan kennismaking
    </a>
  </div>
</div>

<div class="reg-hero">
  <div class="reg-hero-inner">
    <p class="ph-eye">Inschrijvingsportaal</p>
    <h1>Start uw <em>abonnement</em></h1>
    <p class="reg-hero-lead">Vul uw gegevens in en kies een abonnement. In stap 2 controleert u alles voordat u definitief verzendt.</p>
    <div class="steps-bar" aria-label="Stapindicator">
      <div class="step-dot active" id="dot1"></div>
      <div class="step-dot" id="dot2"></div>
      <span class="step-label" id="stepLabel">Stap 1 van 2 — Uw gegevens</span>
    </div>
  </div>
</div>

<section class="reg-section">
  <div class="reg-card">
    <div class="error-box" id="errorBox"><ul id="errorList"></ul></div>
    <div class="success-box" id="successBox">Uw inschrijving is ontvangen. We nemen contact met u op voor de vervolgstappen.</div>

    <form id="registerForm" novalidate>
      <div id="step1" class="step-pane active">
        <div class="form-section">
          <div class="form-section-title">Bedrijfsgegevens</div>
          <div class="form-grid">
            <div class="field span2">
              <label for="company">Bedrijfsnaam <span class="req">*</span></label>
              <input type="text" id="company" name="company" autocomplete="organization" required>
            </div>
            <div class="field">
              <label for="kvk">KvK-nummer <span class="req">*</span></label>
              <input type="text" id="kvk" name="kvk" inputmode="numeric" pattern="\d{8}" maxlength="8" placeholder="12345678" required>
              <span class="field-hint">8 cijfers, zonder spaties</span>
            </div>
            <div class="field">
              <label for="phone">Telefoonnummer</label>
              <input type="tel" id="phone" name="phone" autocomplete="tel" placeholder="+31 6 12345678">
            </div>
          </div>
        </div>

        <div class="form-section">
          <div class="form-section-title">Contactpersoon</div>
          <div class="form-grid">
            <div class="field span2">
              <label for="contact_name">Naam <span class="req">*</span></label>
              <input type="text" id="contact_name" name="contact_name" autocomplete="name" required>
            </div>
            <div class="field span2">
              <label for="email">E-mailadres <span class="req">*</span></label>
              <input type="email" id="email" name="email" autocomplete="email" required>
              <span class="field-hint">Uw bevestiging wordt naar dit e-mailadres gestuurd</span>
            </div>
          </div>
        </div>

        <div class="form-section">
          <div class="form-section-title">Adresgegevens</div>
          <div class="form-grid">
            <div class="field span2">
              <label for="address">Straat + huisnummer <span class="req">*</span></label>
              <input type="text" id="address" name="address" autocomplete="street-address" required>
            </div>
            <div class="field">
              <label for="postal_code">Postcode <span class="req">*</span></label>
              <input type="text" id="postal_code" name="postal_code" autocomplete="postal-code" placeholder="1234 AB" maxlength="7" required>
            </div>
            <div class="field">
              <label for="city">Woonplaats <span class="req">*</span></label>
              <input type="text" id="city" name="city" autocomplete="address-level2" required>
            </div>
          </div>
        </div>

        <div class="form-section">
          <div class="form-section-title">Kies uw abonnement</div>
          <div class="sub-grid" id="subGrid">
            <label class="sub-card" data-id="2">
              <input type="radio" name="subscription_id" value="2" required>
              <div class="sub-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <div class="sub-name">1–5 medewerkers</div>
              <div class="sub-short">Vaste maandprijs voor 1–5 medewerkers</div>
              <div><span class="sub-price-n">€65,00</span><br><span class="sub-price-u">per mnd excl. btw · €78,65 incl. btw</span></div>
            </label>
            <label class="sub-card" data-id="3">
              <input type="radio" name="subscription_id" value="3" required>
              <div class="sub-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <div class="sub-name">6–10 medewerkers</div>
              <div class="sub-short">Vaste maandprijs voor 6–10 medewerkers</div>
              <div><span class="sub-price-n">€99,00</span><br><span class="sub-price-u">per mnd excl. btw · €119,79 incl. btw</span></div>
            </label>
            <label class="sub-card" data-id="4">
              <input type="radio" name="subscription_id" value="4" required>
              <div class="sub-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
              <div class="sub-name">11–20 medewerkers</div>
              <div class="sub-short">Vaste maandprijs voor 11–20 medewerkers</div>
              <div><span class="sub-price-n">€150,00</span><br><span class="sub-price-u">per mnd excl. btw · €181,50 incl. btw</span></div>
            </label>
          </div>

          <div class="sub-detail-panel" id="subDetailPanel" aria-live="polite">
            <div class="sub-detail-title" id="subDetailTitle"></div>
            <div class="sub-detail-desc" id="subDetailDesc"></div>
            <ul class="sub-features" id="subDetailFeatures"></ul>
          </div>

          <div class="price-calc" id="priceCalc" style="margin-top:1rem;">
            <div>
              <div class="price-calc-label">Per maand excl. btw</div>
              <div class="price-calc-sub" id="priceAmountExcl">&mdash;</div>
            </div>
            <div style="text-align:right">
              <div class="price-calc-label">Incl. 21% btw</div>
              <div class="price-calc-amount" id="priceAmount">&mdash;</div>
            </div>
          </div>
        </div>

        <div class="submit-row">
          <p class="submit-note">Controleer uw gegevens in stap 2 voordat u definitief verzendt.</p>
          <button type="button" id="toStep2" class="btn-submit">Naar stap 2</button>
        </div>
      </div>

      <div id="step2" class="step-pane">
        <div class="form-section">
          <div class="form-section-title">Controleer uw gegevens</div>
          <div class="review-grid" id="reviewGrid"></div>
        </div>

        <div class="form-section">
          <div class="terms-row">
            <input type="checkbox" id="terms" name="terms" value="1" required>
            <label for="terms">
              Ik ga akkoord met de <a href="/algemene-voorwaarden/" target="_blank">algemene voorwaarden</a>
              en <a href="/privacyverklaring/" target="_blank">privacyverklaring</a> van Bac-kup.
            </label>
          </div>
          <div class="submit-row">
            <p class="submit-note">Na verzending nemen we contact op voor afronding van uw registratie en betaling.</p>
            <div style="display:flex;gap:.7rem;flex-wrap:wrap;">
              <button type="button" id="backStep1" class="btn-secondary">Terug</button>
              <button type="submit" class="btn-submit">Inschrijving verzenden</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>

<script src="/shared.js"></script>
<script>
(function () {
  'use strict';

  const subs = [
    {id:2,name:'1–5 medewerkers',short_description:'Vaste maandprijs voor 1–5 medewerkers',description:'Procesregie voor organisaties met 1 tot en met 5 medewerkers.',features:['Vaste werkwijze + templates','Stappenoverzicht + actielijst','Planning en afsprakenondersteuning (proceskant)','Support via info@bac-kup.care'],price_cents:6500,interval:'month'},
    {id:3,name:'6–10 medewerkers',short_description:'Vaste maandprijs voor 6–10 medewerkers',description:'Procesregie voor organisaties met 6 tot en met 10 medewerkers.',features:['Vaste werkwijze + templates','Stappenoverzicht + actielijst','Planning en afsprakenondersteuning (proceskant)','Support via info@bac-kup.care'],price_cents:9900,interval:'month'},
    {id:4,name:'11–20 medewerkers',short_description:'Vaste maandprijs voor 11–20 medewerkers',description:'Procesregie voor organisaties met 11 tot en met 20 medewerkers.',features:['Vaste werkwijze + templates','Stappenoverzicht + actielijst','Planning en afsprakenondersteuning (proceskant)','Support via info@bac-kup.care'],price_cents:15000,interval:'month'}
  ];

  const form = document.getElementById('registerForm');
  const step1 = document.getElementById('step1');
  const step2 = document.getElementById('step2');
  const dot1 = document.getElementById('dot1');
  const dot2 = document.getElementById('dot2');
  const stepLabel = document.getElementById('stepLabel');
  const errorBox = document.getElementById('errorBox');
  const errorList = document.getElementById('errorList');
  const successBox = document.getElementById('successBox');
  const toStep2 = document.getElementById('toStep2');
  const backStep1 = document.getElementById('backStep1');
  const reviewGrid = document.getElementById('reviewGrid');

  const grid = document.getElementById('subGrid');
  const panel = document.getElementById('subDetailPanel');
  const panTitle = document.getElementById('subDetailTitle');
  const panDesc = document.getElementById('subDetailDesc');
  const panFeat = document.getElementById('subDetailFeatures');
  const amount = document.getElementById('priceAmount');
  const amountExcl = document.getElementById('priceAmountExcl');

  let selectedId = 0;

  function getSub() {
    return subs.find(s => s.id === selectedId) || null;
  }

  function clearErrors() {
    errorList.innerHTML = '';
    errorBox.classList.remove('show');
    form.querySelectorAll('.error').forEach(el => el.classList.remove('error'));
  }

  function showErrors(errors) {
    if (!errors.length) return;
    errorList.innerHTML = errors.map(e => '<li>' + e + '</li>').join('');
    errorBox.classList.add('show');
    window.scrollTo({top: errorBox.getBoundingClientRect().top + window.scrollY - 120, behavior: 'smooth'});
  }

  function setStep(step) {
    const isStep2 = step === 2;
    step1.classList.toggle('active', !isStep2);
    step2.classList.toggle('active', isStep2);
    dot1.classList.toggle('active', !isStep2);
    dot2.classList.toggle('active', isStep2);
    stepLabel.textContent = isStep2 ? 'Stap 2 van 2 — Controle & verzenden' : 'Stap 1 van 2 — Uw gegevens';
  }

  function buildReview() {
    const sub = getSub();
    const items = [
      ['Bedrijfsnaam', form.company.value.trim()],
      ['KvK-nummer', form.kvk.value.trim()],
      ['Telefoon', form.phone.value.trim() || 'Niet ingevuld'],
      ['Contactpersoon', form.contact_name.value.trim()],
      ['E-mailadres', form.email.value.trim()],
      ['Adres', form.address.value.trim()],
      ['Postcode', form.postal_code.value.trim()],
      ['Woonplaats', form.city.value.trim()],
      ['Abonnement', sub ? sub.name : 'Niet gekozen'],
      ['Prijs per maand', sub ? ('€' + (sub.price_cents / 100).toFixed(2).replace('.', ',') + ' excl. btw') : '—']
    ];

    reviewGrid.innerHTML = items.map(([k,v]) => '<div class="review-item"><span class="review-key">' + k + '</span><span class="review-value">' + v.replace(/</g,'&lt;').replace(/>/g,'&gt;') + '</span></div>').join('');
  }

  function validateStep1() {
    clearErrors();
    const errors = [];
    const requiredFields = [
      ['company', 'Bedrijfsnaam is verplicht.'],
      ['kvk', 'KvK-nummer is verplicht.'],
      ['contact_name', 'Naam contactpersoon is verplicht.'],
      ['email', 'E-mailadres is verplicht.'],
      ['address', 'Adres is verplicht.'],
      ['postal_code', 'Postcode is verplicht.'],
      ['city', 'Woonplaats is verplicht.']
    ];

    requiredFields.forEach(([name,msg]) => {
      const field = form[name];
      if (!field.value.trim()) {
        errors.push(msg);
        field.classList.add('error');
      }
    });

    const kvk = form.kvk.value.replace(/\D/g,'');
    if (kvk && kvk.length !== 8) {
      errors.push('KvK-nummer moet uit 8 cijfers bestaan.');
      form.kvk.classList.add('error');
    }

    const email = form.email.value.trim();
    if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      errors.push('Vul een geldig e-mailadres in.');
      form.email.classList.add('error');
    }

    const selected = form.querySelector('input[name="subscription_id"]:checked');
    if (!selected) errors.push('Kies een abonnement.');

    showErrors(errors);
    return errors.length === 0;
  }

  function updatePanelAndPrice() {
    const sub = getSub();
    if (!sub) {
      panel.classList.remove('show');
      amount.textContent = '—';
      amountExcl.textContent = '—';
      return;
    }

    panTitle.textContent = sub.name;
    panDesc.textContent = sub.description || sub.short_description;
    panFeat.innerHTML = (sub.features || []).map(f => '<li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>' + f.replace(/</g,'&lt;').replace(/>/g,'&gt;') + '</li>').join('');
    panel.classList.add('show');

    const excl = (sub.price_cents / 100).toFixed(2).replace('.', ',');
    const incl = (sub.price_cents * 1.21 / 100).toFixed(2).replace('.', ',');
    amountExcl.textContent = '€' + excl;
    amount.textContent = '€' + incl;
  }

  grid.addEventListener('change', (e) => {
    const radio = e.target.closest('input[type="radio"]');
    if (!radio) return;
    selectedId = parseInt(radio.value, 10);
    grid.querySelectorAll('.sub-card').forEach(c => c.classList.toggle('selected', parseInt(c.dataset.id, 10) === selectedId));
    updatePanelAndPrice();
  });

  toStep2.addEventListener('click', () => {
    const checked = form.querySelector('input[name="subscription_id"]:checked');
    selectedId = checked ? parseInt(checked.value, 10) : 0;
    if (!validateStep1()) return;
    buildReview();
    setStep(2);
    clearErrors();
    successBox.classList.remove('show');
    window.scrollTo({top: 0, behavior: 'smooth'});
  });

  backStep1.addEventListener('click', () => {
    setStep(1);
    clearErrors();
    successBox.classList.remove('show');
    window.scrollTo({top: 0, behavior: 'smooth'});
  });

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    clearErrors();
    const errors = [];
    if (!document.getElementById('terms').checked) {
      errors.push('U moet akkoord gaan met de voorwaarden en privacyverklaring.');
    }
    if (errors.length) {
      showErrors(errors);
      return;
    }

    successBox.classList.add('show');
    form.reset();
    selectedId = 0;
    grid.querySelectorAll('.sub-card').forEach(c => c.classList.remove('selected'));
    updatePanelAndPrice();
    setStep(1);
    window.scrollTo({top: 0, behavior: 'smooth'});
  });

  updatePanelAndPrice();
}());
</script>
</body>
</html>
