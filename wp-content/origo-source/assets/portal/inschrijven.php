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
/* ── PORTAL REGISTRATIE ─────────────────────────────────────────────────────── */
.reg-hero { background: var(--green); padding: 52px var(--px) 44px; }
.reg-hero-inner { max-width: 760px; margin: 0 auto; }
.reg-hero .ph-eye { font-size:.62rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--teal-lt);margin-bottom:.55rem; }
.reg-hero h1 { font-family:'Playfair Display',serif;font-size:clamp(1.7rem,4vw,2.6rem);font-weight:900;color:#fff;line-height:1.12;margin-bottom:.6rem; }
.reg-hero h1 em { font-style:normal;color:var(--mint); }
.reg-hero-lead { font-size:.93rem;color:rgba(255,255,255,.6);line-height:1.75; }

/* Steps indicator */
.steps-bar { display:flex;align-items:center;gap:8px;margin-top:1.6rem; }
.step-dot { width:8px;height:8px;border-radius:50%;background:rgba(255,255,255,.25); }
.step-dot.active { background:var(--mint);width:24px;border-radius:4px; }
.step-label { font-size:.72rem;color:rgba(255,255,255,.45);margin-left:4px; }

/* Form wrapper */
.reg-section { background:var(--cream);padding:48px var(--px); }
.reg-card { max-width:760px;margin:0 auto;background:var(--white);border-radius:var(--r);padding:2.4rem;box-shadow:var(--shadow-sm);border:1px solid rgba(168,212,204,.2); }

/* Section headings */
.form-section { margin-bottom:2rem; }
.form-section + .form-section { padding-top:2rem;border-top:1px solid rgba(168,212,204,.18); }
.form-section-title { font-size:.65rem;font-weight:700;text-transform:uppercase;letter-spacing:.14em;color:var(--teal);margin-bottom:1.2rem;display:flex;align-items:center;gap:8px; }
.form-section-title::before { content:'';width:16px;height:2px;background:var(--teal);border-radius:2px;flex-shrink:0; }

/* Grid */
.form-grid { display:grid;grid-template-columns:1fr 1fr;gap:1rem; }
.form-grid .span2 { grid-column:span 2; }
@media(max-width:560px){ .form-grid{grid-template-columns:1fr} .form-grid .span2{grid-column:span 1} }

/* Fields */
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

/* Subscriptie-kaarten */
.sub-grid { display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:1rem;margin-bottom:1.4rem; }
.sub-card {
    border:2px solid rgba(168,212,204,.3);border-radius:16px;padding:1.4rem;cursor:pointer;
    transition:border-color .2s,box-shadow .2s,transform .18s;position:relative;background:var(--white);
}
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

/* Detail-tabpaneel */
.sub-detail-panel {
    background:var(--mint-pale);border-radius:14px;padding:1.4rem 1.6rem;
    border:1px solid rgba(61,140,122,.18);margin-bottom:1.4rem;
    display:none;
}
.sub-detail-panel.show { display:block; }
.sub-detail-title { font-weight:700;font-size:.9rem;color:var(--ink);margin-bottom:.7rem; }
.sub-detail-desc { font-size:.85rem;color:var(--ink-mid);line-height:1.75;margin-bottom:1rem; }
.sub-features { list-style:none;display:flex;flex-direction:column;gap:.45rem; }
.sub-features li { display:flex;align-items:flex-start;gap:8px;font-size:.83rem;color:var(--ink-mid); }
.sub-features li svg { flex-shrink:0;color:var(--teal);margin-top:2px; }

/* Prijs-calculator */
.price-calc { background:var(--green);border-radius:14px;padding:1.2rem 1.5rem;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.75rem; }
.price-calc-label { font-size:.82rem;color:rgba(255,255,255,.65); }
.price-calc-amount { font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:900;color:var(--mint); }
.price-calc-sub { font-size:.7rem;color:rgba(255,255,255,.4); }

/* Medewerkers teller */
.employee-row { display:flex;align-items:center;gap:1rem;background:var(--cream);border-radius:10px;padding:.8rem 1rem;border:1.5px solid rgba(168,212,204,.3); }
.employee-row label { font-size:.83rem;font-weight:600;color:var(--ink-mid);flex:1; }
.employee-counter { display:flex;align-items:center;gap:.5rem; }
.emp-btn { width:32px;height:32px;border-radius:8px;border:1.5px solid rgba(168,212,204,.4);background:var(--white);color:var(--teal);font-size:1.1rem;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .15s; }
.emp-btn:hover { background:var(--teal);color:#fff;border-color:var(--teal); }
.employee-counter input { width:60px;text-align:center;border:1.5px solid rgba(168,212,204,.4);border-radius:8px;padding:.4rem;font-size:.9rem;font-weight:600; }

/* Terms */
.terms-row { display:flex;align-items:flex-start;gap:.75rem;padding:1rem;background:var(--cream);border-radius:10px; }
.terms-row input[type="checkbox"] { margin-top:3px;width:18px;height:18px;flex-shrink:0;accent-color:var(--teal); }
.terms-row label { font-size:.82rem;color:var(--ink-mid);line-height:1.6; }
.terms-row a { color:var(--teal);text-decoration:underline; }

/* Errors */
.error-box { background:#fef2f2;border:1px solid #fca5a5;border-radius:10px;padding:1rem 1.2rem;margin-bottom:1.4rem; }
.error-box ul { list-style:none; }
.error-box li { font-size:.83rem;color:#c47a6a;padding:.15rem 0;display:flex;align-items:flex-start;gap:6px; }
.error-box li::before { content:'✕';flex-shrink:0; }

/* Submit */
.submit-row { display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;margin-top:1.6rem;padding-top:1.4rem;border-top:1px solid rgba(168,212,204,.18); }
.submit-note { font-size:.75rem;color:var(--ink-lt);max-width:280px;line-height:1.55; }
.btn-submit { background:var(--green);color:#fff;border:none;padding:.9rem 2.2rem;border-radius:100px;font-family:'DM Sans',sans-serif;font-size:.9rem;font-weight:700;cursor:pointer;display:inline-flex;align-items:center;gap:8px;transition:all .22s;min-height:52px; }
.btn-submit:hover { background:var(--teal);transform:translateY(-2px);box-shadow:0 8px 24px rgba(61,140,122,.28); }
.btn-submit svg { transition:transform .2s; }
.btn-submit:hover svg { transform:translateX(3px); }

/* No subscriptions notice */
.no-subs { text-align:center;padding:2rem;background:var(--mint-pale);border-radius:14px;color:var(--ink-mid);font-size:.88rem; }
</style>
</head>
<body>
<!-- NAV -->
<nav id="mainNav" role="navigation" aria-label="Hoofdnavigatie">
  <div class="nav-inner">
    <a href="/index.html" class="nav-logo" aria-label="Bac-kup – terug naar home">
      <img src="/logo.png" alt="Bac-kup" class="nav-logo-img">
    </a>
    <ul class="nav-links" role="list">
      <li><a href="/abonnementen.html">Abonnementen</a></li>
      <li><a href="/werkwijze.html">Werkwijze</a></li>
      <li><a href="/contact.html">Contact</a></li>
    </ul>
  </div>
</nav>

<!-- HERO -->
<div class="reg-hero">
  <div class="reg-hero-inner">
    <p class="ph-eye">Inschrijvingsportaal</p>
    <h1>Start uw <em>abonnement</em></h1>
    <p class="reg-hero-lead">Vul uw gegevens in en kies een abonnement. Na betaling ontvangt u direct uw klantnummer en bevestiging per e-mail.</p>
    <div class="steps-bar" aria-label="Stap 1 van 2">
      <div class="step-dot active"></div>
      <div class="step-dot"></div>
      <span class="step-label">Stap 1 van 2 — Uw gegevens</span>
    </div>
  </div>
</div>

<!-- FORM -->
<section class="reg-section">
  <div class="reg-card">

    
    <form method="POST" action="" novalidate>
      <input type="hidden" name="csrf_token" value="4ca30f87fd868ca228870176e4c5ad9769535de1109e4a4fbdd15163f02517c0">

      <!-- SECTIE 1: BEDRIJFSGEGEVENS -->
      <div class="form-section">
        <div class="form-section-title">Bedrijfsgegevens</div>
        <div class="form-grid">
          <div class="field span2">
            <label for="company">Bedrijfsnaam <span class="req">*</span></label>
            <input type="text" id="company" name="company" value=""
                   autocomplete="organization" required
                   class="error">
          </div>
          <div class="field">
            <label for="kvk">KvK-nummer <span class="req">*</span></label>
            <input type="text" id="kvk" name="kvk" value=""
                   inputmode="numeric" pattern="\d{8}" maxlength="8" placeholder="12345678" required>
            <span class="field-hint">8 cijfers, zonder spaties</span>
          </div>
          <div class="field">
            <label for="phone">Telefoonnummer</label>
            <input type="tel" id="phone" name="phone" value=""
                   autocomplete="tel" placeholder="+31 6 12345678">
          </div>
        </div>
      </div>

      <!-- SECTIE 2: CONTACTPERSOON -->
      <div class="form-section">
        <div class="form-section-title">Contactpersoon</div>
        <div class="form-grid">
          <div class="field span2">
            <label for="contact_name">Naam <span class="req">*</span></label>
            <input type="text" id="contact_name" name="contact_name" value=""
                   autocomplete="name" required>
          </div>
          <div class="field span2">
            <label for="email">E-mailadres <span class="req">*</span></label>
            <input type="email" id="email" name="email" value=""
                   autocomplete="email" required>
            <span class="field-hint">Uw klantnummer en bevestiging worden hierheen gestuurd</span>
          </div>
        </div>
      </div>

      <!-- SECTIE 3: ADRESGEGEVENS -->
      <div class="form-section">
        <div class="form-section-title">Adresgegevens</div>
        <div class="form-grid">
          <div class="field span2">
            <label for="address">Straat + huisnummer <span class="req">*</span></label>
            <input type="text" id="address" name="address" value=""
                   autocomplete="street-address" required>
          </div>
          <div class="field">
            <label for="postal_code">Postcode <span class="req">*</span></label>
            <input type="text" id="postal_code" name="postal_code" value=""
                   autocomplete="postal-code" placeholder="1234 AB" maxlength="7" required>
          </div>
          <div class="field">
            <label for="city">Woonplaats <span class="req">*</span></label>
            <input type="text" id="city" name="city" value=""
                   autocomplete="address-level2" required>
          </div>
        </div>
      </div>

      <!-- SECTIE 4: ABONNEMENT -->
      <div class="form-section">
        <div class="form-section-title">Kies uw abonnement</div>

        
          <div class="sub-grid" id="subGrid">
                        <label class="sub-card "
                   data-id="2">
              <input type="radio" name="subscription_id" value="2"
                                          required>
              <div class="sub-check">
                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div class="sub-name">1–5 medewerkers</div>
              <div class="sub-short">Vaste maandprijs voor 1–5 medewerkers</div>
              <div>
                <span class="sub-price-n">€65,00</span><br>
                <span class="sub-price-u">per mnd excl. btw &middot; €78,65 incl. btw</span>
              </div>
            </label>
                        <label class="sub-card "
                   data-id="3">
              <input type="radio" name="subscription_id" value="3"
                                          required>
              <div class="sub-check">
                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div class="sub-name">6–10 medewerkers</div>
              <div class="sub-short">Vaste maandprijs voor 6–10 medewerkers</div>
              <div>
                <span class="sub-price-n">€99,00</span><br>
                <span class="sub-price-u">per mnd excl. btw &middot; €119,79 incl. btw</span>
              </div>
            </label>
                        <label class="sub-card "
                   data-id="4">
              <input type="radio" name="subscription_id" value="4"
                                          required>
              <div class="sub-check">
                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div class="sub-name">11–20 medewerkers</div>
              <div class="sub-short">Vaste maandprijs voor 11–20 medewerkers</div>
              <div>
                <span class="sub-price-n">€150,00</span><br>
                <span class="sub-price-u">per mnd excl. btw &middot; €181,50 incl. btw</span>
              </div>
            </label>
                      </div>

          <!-- Beschrijvings-tabpaneel -->
          <div class="sub-detail-panel" id="subDetailPanel" aria-live="polite">
            <div class="sub-detail-title" id="subDetailTitle"></div>
            <div class="sub-detail-desc" id="subDetailDesc"></div>
            <ul class="sub-features" id="subDetailFeatures"></ul>
          </div>


          <!-- Prijs-calculator -->
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

      <!-- SECTIE 5: VOORWAARDEN + SUBMIT -->
      <div class="form-section">
        <div class="terms-row">
          <input type="checkbox" id="terms" name="terms" value="1"
                  required>
          <label for="terms">
            Ik ga akkoord met de <a href="/algemene-voorwaarden.html" target="_blank">algemene voorwaarden</a>
            en <a href="/privacyverklaring.html" target="_blank">privacyverklaring</a> van Bac-kup B.V.
          </label>
        </div>

        <div class="submit-row">
          <p class="submit-note">
            Na het invullen gaat u naar de beveiligde betaalpagina van Stripe.
            Uw klantnummer ontvangt u direct na betaling.
          </p>
          <button type="submit" class="btn-submit">
            Verder naar betaling
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </button>
        </div>
      </div>

    </form>
  </div>
</section>

<script>
(function () {
  'use strict';

  const subs = [{"id":2,"name":"1\u20135 medewerkers","short_description":"Vaste maandprijs voor 1\u20135 medewerkers","description":"Procesregie voor organisaties met 1 tot en met 5 medewerkers.","features":["Vaste werkwijze + templates","Stappenoverzicht + actielijst","Planning en afsprakenondersteuning (proceskant)","Support via info@bac-kup.care"],"price_cents":6500,"interval":"month"},{"id":3,"name":"6\u201310 medewerkers","short_description":"Vaste maandprijs voor 6\u201310 medewerkers","description":"Procesregie voor organisaties met 6 tot en met 10 medewerkers.","features":["Vaste werkwijze + templates","Stappenoverzicht + actielijst","Planning en afsprakenondersteuning (proceskant)","Support via info@bac-kup.care"],"price_cents":9900,"interval":"month"},{"id":4,"name":"11\u201320 medewerkers","short_description":"Vaste maandprijs voor 11\u201320 medewerkers","description":"Procesregie voor organisaties met 11 tot en met 20 medewerkers.","features":["Vaste werkwijze + templates","Stappenoverzicht + actielijst","Planning en afsprakenondersteuning (proceskant)","Support via info@bac-kup.care"],"price_cents":15000,"interval":"month"}];

  const grid     = document.getElementById('subGrid');
  const panel    = document.getElementById('subDetailPanel');
  const panTitle = document.getElementById('subDetailTitle');
  const panDesc  = document.getElementById('subDetailDesc');
  const panFeat  = document.getElementById('subDetailFeatures');
  const amount    = document.getElementById('priceAmount');
  const amountExcl = document.getElementById('priceAmountExcl');

  if (!grid) return;

  let selectedId = 0;

  function getSub() {
    return subs.find(s => s.id === selectedId) || null;
  }

  function updatePanel() {
    const sub = getSub();
    if (!sub) { panel.classList.remove('show'); return; }

    panTitle.textContent = sub.name;
    panDesc.textContent  = sub.description || sub.short_description;
    panFeat.innerHTML    = (sub.features || [])
      .map(f => `<li>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
        ${f.replace(/</g,'&lt;').replace(/>/g,'&gt;')}
      </li>`).join('');

    panel.classList.add('show');
  }

  function updatePrice() {
    const sub = getSub();
    if (!sub) {
      if (amount) amount.textContent = '—';
      if (amountExcl) amountExcl.textContent = '—';
      return;
    }
    const excl = (sub.price_cents / 100).toFixed(2).replace('.', ',');
    const incl = (sub.price_cents * 1.21 / 100).toFixed(2).replace('.', ',');
    if (amountExcl) amountExcl.textContent = `€${excl}`;
    if (amount) amount.textContent = `€${incl}`;
  }

  // Subscription card klik
  grid.addEventListener('change', e => {
    const radio = e.target.closest('input[type="radio"]');
    if (!radio) return;
    selectedId = parseInt(radio.value);
    grid.querySelectorAll('.sub-card').forEach(c => {
      c.classList.toggle('selected', parseInt(c.dataset.id) === selectedId);
    });
    updatePanel();
    updatePrice();
  });

  // Init
  updatePanel();
  updatePrice();
}());
</script>
</body>
</html>
