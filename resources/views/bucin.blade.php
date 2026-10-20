<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Untuk Kesayanganku 💕</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Pacifico&display=swap" rel="stylesheet">
  <style>
    /* =============================================
       RESET & BASE
    ============================================= */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html, body {
      height: 100%;
      font-family: 'Nunito', sans-serif;
      overflow: hidden;
    }

    body {
      background: linear-gradient(135deg, #ff9a9e, #fad0c4, #ffecd2, #ff9a9e, #f093fb, #f5576c);
      background-size: 400% 400%;
      animation: gradientShift 8s ease infinite;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    @keyframes gradientShift {
      0%   { background-position: 0% 50%; }
      50%  { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* =============================================
       FLOATING HEARTS
    ============================================= */
    #heartsBg {
      position: fixed;
      inset: 0;
      pointer-events: none;
      overflow: hidden;
      z-index: 0;
    }

    .fh {
      position: absolute;
      bottom: -50px;
      animation: floatUp linear infinite;
      opacity: 0.65;
      user-select: none;
    }

    @keyframes floatUp {
      from { transform: translateY(0) rotate(0deg); opacity: 0.65; }
      to   { transform: translateY(-115vh) rotate(360deg); opacity: 0; }
    }

    /* =============================================
       PAGE SYSTEM
    ============================================= */
    .page {
      display: none;
      position: fixed;
      inset: 0;
      align-items: center;
      justify-content: center;
      z-index: 10;
      padding: 1rem;
      overflow-y: auto;
    }

    .page.active {
      display: flex;
      animation: fadeInUp 0.55s ease;
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(28px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* =============================================
       CARD
    ============================================= */
    .card {
      background: rgba(255,255,255,0.88);
      backdrop-filter: blur(22px);
      -webkit-backdrop-filter: blur(22px);
      border-radius: 30px;
      padding: 2.6rem 2.2rem;
      max-width: 530px;
      width: 100%;
      text-align: center;
      box-shadow: 0 10px 50px rgba(240,100,120,0.28), 0 2px 12px rgba(0,0,0,0.07);
      border: 1.5px solid rgba(255,180,195,0.5);
      position: relative;
      overflow: hidden;
    }

    .card::before {
      content: '';
      position: absolute;
      top: -70px; right: -70px;
      width: 220px; height: 220px;
      background: radial-gradient(circle, rgba(255,100,140,0.13), transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    /* =============================================
       SHARED ELEMENTS
    ============================================= */
    .emoji-top {
      font-size: 3.2rem;
      display: block;
      margin-bottom: 0.5rem;
      animation: pulse 1.8s ease-in-out infinite;
    }

    .emoji-top.big { font-size: 4.2rem; }

    @keyframes pulse {
      0%,100% { transform: scale(1); }
      50%      { transform: scale(1.18); }
    }

    .hint {
      font-size: 1.05rem;
      color: #e0557a;
      font-weight: 800;
      margin-bottom: 0.4rem;
      line-height: 1.55;
    }

    h1.title {
      font-family: 'Pacifico', cursive;
      font-size: 1.85rem;
      color: #bf3558;
      margin-bottom: 1.6rem;
    }

    h2.q-title {
      font-family: 'Pacifico', cursive;
      font-size: 1.55rem;
      color: #bf3558;
      line-height: 1.35;
    }

    .q-row {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.7rem;
      margin-bottom: 2rem;
    }

    .q-icon { font-size: 2rem; animation: pulse 2s ease-in-out infinite; }

    /* =============================================
       INPUT
    ============================================= */
    .input-wrap {
      display: flex;
      align-items: center;
      background: rgba(255,218,228,0.45);
      border: 2px solid #f9a8bc;
      border-radius: 50px;
      padding: 0.65rem 1.25rem;
      margin-bottom: 1.5rem;
      transition: border-color .3s, box-shadow .3s;
    }

    .input-wrap:focus-within {
      border-color: #e0557a;
      box-shadow: 0 0 0 4px rgba(224,85,122,0.14);
    }

    .input-wrap span { font-size: 1.2rem; margin-right: 0.6rem; }

    .input-wrap input {
      background: none;
      border: none;
      outline: none;
      font-family: 'Nunito', sans-serif;
      font-size: 1rem;
      color: #7a1534;
      width: 100%;
      font-weight: 700;
    }

    .input-wrap input::placeholder { color: #e8a0b2; font-weight: 400; }

    /* =============================================
       MAIN BUTTON
    ============================================= */
    .btn-main {
      background: linear-gradient(135deg, #f5576c, #f093fb);
      color: #fff;
      border: none;
      border-radius: 50px;
      padding: 0.88rem 2.6rem;
      font-size: 1.1rem;
      font-weight: 800;
      font-family: 'Nunito', sans-serif;
      cursor: pointer;
      box-shadow: 0 4px 22px rgba(245,87,108,0.42);
      transition: transform .2s, box-shadow .2s;
    }

    .btn-main:hover { transform: translateY(-3px) scale(1.04); box-shadow: 0 8px 30px rgba(245,87,108,0.5); }
    .btn-main:active { transform: scale(0.97); }
    .btn-main:disabled { opacity: 0.42; cursor: not-allowed; transform: none; }

    /* =============================================
       HEART BUTTONS (sayang/marah)
    ============================================= */
    .btn-row {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      justify-content: center;
      align-items: center;
      min-height: 130px;
    }

    .hbtn {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.35rem;
      background: linear-gradient(145deg, #fff0f4, #ffdde6);
      border: 2.5px solid #f9a8bc;
      border-radius: 22px;
      padding: 0.9rem 1.45rem;
      cursor: pointer;
      font-family: 'Nunito', sans-serif;
      font-weight: 800;
      color: #bf3558;
      box-shadow: 0 4px 18px rgba(240,100,125,0.2);
      transition: transform .25s cubic-bezier(.175,.885,.32,1.275), box-shadow .25s, border-color .25s;
      position: relative;
    }

    .hbtn:hover { transform: translateY(-4px) scale(1.06); box-shadow: 0 8px 26px rgba(240,100,125,0.38); border-color: #e0557a; }
    .hbtn:active { transform: scale(0.95); }

    .hbtn .hi {
      display: inline-flex;
      filter: drop-shadow(2px 4px 8px rgba(200,40,60,0.5)) drop-shadow(-1px -2px 3px rgba(255,180,190,0.55));
      transition: transform .3s;
      line-height: 1;
    }

    .hbtn:hover .hi { transform: scale(1.18) rotate(-6deg); }

    .hbtn.no-btn {
      background: linear-gradient(145deg, #f5f5f5, #e8e8e8);
      border-color: #ccc;
      color: #999;
    }

    .hbtn.no-btn .hi { filter: drop-shadow(1px 2px 4px rgba(150,150,150,0.35)); }

    /* =============================================
       AFIRMASI
    ============================================= */
    .afirmasi-card {
      max-width: 560px;
      text-align: left;
      max-height: 88vh;
      overflow-y: auto;
    }

    .afirmasi-card::-webkit-scrollbar { width: 6px; }
    .afirmasi-card::-webkit-scrollbar-thumb { background: #f9a8bc; border-radius: 10px; }

    .afirmasi-header { text-align: center; margin-bottom: 1.4rem; }

    .afirmasi-header h2 {
      font-family: 'Pacifico', cursive;
      font-size: 1.5rem;
      color: #bf3558;
      margin-top: 0.5rem;
    }

    .afirmasi-body p {
      color: #5a2233;
      font-size: 0.97rem;
      line-height: 1.82;
      margin-bottom: 1.05rem;
      font-weight: 600;
    }

    .closing {
      text-align: center;
      font-family: 'Pacifico', cursive;
      font-size: 0.98rem !important;
      color: #e0557a !important;
      padding: 0.85rem 1rem;
      background: rgba(255,180,195,0.18);
      border-radius: 14px;
      border: 1px dashed #f9a8bc;
      margin-top: 0.5rem;
    }

    .afirmasi-card .btn-main { display: block; margin: 1.5rem auto 0; }

    /* =============================================
       PAP PAGE
    ============================================= */
    .pap-text {
      font-size: 1.06rem;
      color: #bf3558;
      font-weight: 700;
      line-height: 1.75;
      margin-bottom: 1.5rem;
    }

    .upload-label { display: block; cursor: pointer; }

    .upload-area {
      border: 2.5px dashed #f9a8bc;
      border-radius: 22px;
      padding: 2rem 1rem;
      background: rgba(255,218,228,0.28);
      transition: background .3s, border-color .3s;
      margin-bottom: 1.2rem;
    }

    .upload-area:hover { background: rgba(255,180,195,0.38); border-color: #e0557a; }
    .upload-area .ui  { font-size: 3rem; margin-bottom: 0.5rem; }
    .upload-area p    { color: #bf3558; font-weight: 700; margin-bottom: 0.2rem; }
    .upload-area .uh  { font-size: 0.85rem; color: #e8a0b2; font-weight: 600; }

    .photo-preview {
      width: 100%;
      max-height: 240px;
      object-fit: cover;
      border-radius: 18px;
      border: 3px solid #f9a8bc;
      margin-bottom: 0.6rem;
      box-shadow: 0 4px 22px rgba(240,100,125,0.22);
    }

    .preview-name { font-size: 0.85rem; color: #e0557a; font-weight: 700; margin-bottom: 1rem; }
    .saved-info   { margin-top: 0.8rem; font-size: 0.88rem; color: #e0557a; font-weight: 700; min-height: 1.2rem; }

    /* =============================================
       DONE PAGE
    ============================================= */
    .done-card { animation: popIn 0.6s cubic-bezier(.175,.885,.32,1.275); }

    @keyframes popIn {
      from { transform: scale(0.65); opacity: 0; }
      to   { transform: scale(1);    opacity: 1; }
    }

    .done-card h2 { font-family: 'Pacifico', cursive; font-size: 1.6rem; color: #bf3558; margin: 0.8rem 0 0.6rem; }
    .done-card p  { color: #5a2233; font-weight: 600; line-height: 1.7; }
    .done-hearts  { font-size: 2.6rem; margin-top: 1.2rem; animation: pulse 1.5s ease-in-out infinite; }

    /* =============================================
       SPARKLE
    ============================================= */
    .sparkle {
      position: fixed;
      pointer-events: none;
      z-index: 9999;
      animation: sparkAnim 0.6s ease-out forwards;
      font-size: 1.4rem;
    }

    @keyframes sparkAnim {
      0%   { transform: scale(0) rotate(0deg); opacity: 1; }
      100% { transform: scale(2.2) rotate(360deg); opacity: 0; }
    }

    /* =============================================
       RESPONSIVE
    ============================================= */
    @media (max-width: 480px) {
      .card { padding: 2rem 1.2rem; }
      h2.q-title { font-size: 1.25rem; }
      h1.title   { font-size: 1.5rem; }
    }
  </style>
</head>
<body>

  <!-- Floating hearts -->
  <div id="heartsBg"></div>

  <!-- =========================================
       PAGE 1 : LOGIN
  ========================================= -->
  <div class="page active" id="pg-login">
    <div class="card">
      <span class="emoji-top">💌</span>
      <p class="hint">Cobaa siapaa namaa wanita kesayangann akuu??</p>
      <h1 class="title">Login Dulu Yaa</h1>
      <div class="input-wrap">
        <span>🌸</span>
        <input id="nameInput" type="text" placeholder="Masukkan namamu sayang..." autocomplete="off" />
      </div>
      <button class="btn-main" onclick="doLogin()">Masuk 💕</button>
    </div>
  </div>

  <!-- =========================================
       PAGE 2 : SAYANG QUESTIONS (1–5)
  ========================================= -->
  <div class="page" id="pg-sayang">
    <div class="card">
      <div class="q-row">
        <span class="q-icon">💝</span>
        <h2 class="q-title">KAMU SAYANG GA SAMA AKU?</h2>
        <span class="q-icon">💝</span>
      </div>
      <div class="btn-row" id="sayangBtns"></div>
    </div>
  </div>

  <!-- =========================================
       PAGE 3 : MARAH QUESTION
  ========================================= -->
  <div class="page" id="pg-marah">
    <div class="card" id="marahCard">
      <div class="q-row">
        <span class="q-icon">🥺</span>
        <h2 class="q-title">Kamu masih marah sama aku?</h2>
        <span class="q-icon">🥺</span>
      </div>
      <div class="btn-row" id="marahBtns">
        <button class="hbtn" id="btnEngga" onclick="clickEngga()">
          <span class="hi" style="font-size:2rem">❤️</span>
          <span>Engga kok sayanggku</span>
        </button>
        <button class="hbtn no-btn" id="btnMarah" onclick="clickMarah(event)">
          <span class="hi" style="font-size:2rem">❤️</span>
          <span>Ga akan maafin kamu</span>
        </button>
      </div>
    </div>
  </div>

  <!-- =========================================
       PAGE 4 : AFIRMASI
  ========================================= -->
  <div class="page" id="pg-afirmasi">
    <div class="card afirmasi-card">
      <div class="afirmasi-header">
        <span class="emoji-top big">💖</span>
        <h2 id="afirmasiName">Hey sayang,</h2>
      </div>
      <div class="afirmasi-body">
        <p>
          Aku tau aku ga selalu sempurna, dan mungkin ada momen di mana kamu ngerasa aku kurang hadir buat kamu.
          Tapi percayalah, setiap kali aku ngelakuin hal yang nyakitin kamu — itu bukan karena aku ga peduli.
          Justru sebaliknya, aku peduli banget, sampe kadang aku takut kehilangan kamu dan malah jadi canggung sendiri.
          Makasih udah mau dengerin aku, dan makasih udah kasih aku kesempatan buat jelasin.
        </p>
        <p>
          Kedepannya aku janji bakal lebih peka, lebih sabar, dan lebih hadir — bukan cuma secara fisik, tapi juga secara hati.
          Aku mau jadi orang yang bisa kamu andelin, bukan cuma di saat seneng aja, tapi juga waktu kamu lagi capek,
          lagi down, atau lagi butuh seseorang yang bisa dengerin tanpa ngehakimin.
          Kamu berhak dapet yang terbaik, dan aku mau terus belajar buat jadi lebih baik khusus buat kamu.
        </p>
        <p>
          Ini bukan sekedar kata-kata kosong — ini komitmen aku yang aku tulis dari bagian paling dalem hati aku.
          Kamu adalah orang yang bikin hari-hari aku lebih berwarna, dan aku ga mau nyia-nyiain itu.
          Aku sayang kamu, beneran, dengan segala kekurangan dan kelebihan kamu.
        </p>
        <p class="closing">
          terima kasih yaa sayang karena sudah memaafkan aku dan ga marah lagi sama aku 😊🩷
        </p>
      </div>
      <button class="btn-main" onclick="goToPap()">Lanjut 💌</button>
    </div>
  </div>

  <!-- =========================================
       PAGE 5 : PAP REQUEST
  ========================================= -->
  <div class="page" id="pg-pap">
    <div class="card">
      <span class="emoji-top big">🩷</span>
      <p class="pap-text">
        Good morning sayangku cantikku cintaku 🩷<br>
        cobaa aku udah 3 hari belum dapat pap dari kamuu
      </p>
      <label class="upload-label" for="papInput">
        <div class="upload-area" id="uploadArea">
          <div class="ui">📸</div>
          <p>Klik di sini atau drag foto kamu</p>
          <p class="uh">JPG, PNG, HEIC diterima 🌸</p>
        </div>
        <input type="file" id="papInput" accept="image/*" onchange="handlePhoto(event)" style="display:none" />
      </label>
      <div id="previewWrap" style="display:none">
        <img id="photoPreview" src="" alt="preview" class="photo-preview" />
        <p class="preview-name" id="previewName"></p>
      </div>
      <button class="btn-main" id="submitBtn" onclick="submitPhoto()" disabled>Kirim ke Dia 💕</button>
      <p class="saved-info" id="savedInfo"></p>
    </div>
  </div>

  <!-- =========================================
       PAGE 6 : DONE
  ========================================= -->
  <div class="page" id="pg-done">
    <div class="card done-card">
      <span class="emoji-top big">🥰</span>
      <h2>Makasih udah kirim pap nya sayang!</h2>
      <p>Foto kamu sudah tersimpan yaa 💕<br>Kamu tuh selalu berhasil bikin aku senyum-senyum sendiri.</p>
      <div class="done-hearts">💗💗💗</div>
    </div>
  </div>

  <script>
    // =============================================
    // STATE
    // =============================================
    let userName    = '';
    let sayangStep  = 0;
    let marahClicks = 0;
    let selectedFile = null;

    const CSRF = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // =============================================
    // FLOATING HEARTS
    // =============================================
    const HEART_EMOJIS = ['💕','💗','💓','💞','🩷','❤️','💝','💖'];

    function spawnHeart() {
      const bg  = document.getElementById('heartsBg');
      const el  = document.createElement('span');
      el.className   = 'fh';
      el.textContent = HEART_EMOJIS[Math.floor(Math.random() * HEART_EMOJIS.length)];
      el.style.left  = Math.random() * 100 + 'vw';
      const dur      = 5 + Math.random() * 8;
      el.style.animationDuration = dur + 's';
      el.style.fontSize          = (0.8 + Math.random() * 1.4) + 'rem';
      el.style.animationDelay    = (Math.random() * 3) + 's';
      bg.appendChild(el);
      setTimeout(() => el.remove(), (dur + 3) * 1000);
    }

    setInterval(spawnHeart, 600);
    for (let i = 0; i < 12; i++) spawnHeart();

    // =============================================
    // SPARKLE ON CLICK
    // =============================================
    const SPARKS = ['✨','💫','🌟','⭐','💥'];

    document.addEventListener('click', e => {
      for (let i = 0; i < 4; i++) {
        const el    = document.createElement('span');
        el.className = 'sparkle';
        el.textContent = SPARKS[Math.floor(Math.random() * SPARKS.length)];
        const angle = (Math.PI * 2 / 4) * i + Math.random() * 0.5;
        const dist  = 40 + Math.random() * 45;
        el.style.left = (e.clientX + Math.cos(angle) * dist) + 'px';
        el.style.top  = (e.clientY + Math.sin(angle) * dist) + 'px';
        document.body.appendChild(el);
        setTimeout(() => el.remove(), 700);
      }
    });

    // =============================================
    // PAGE NAV
    // =============================================
    function showPage(id) {
      document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
      document.getElementById(id).classList.add('active');
    }

    // =============================================
    // PAGE 1 – LOGIN
    // =============================================
    function doLogin() {
      const val = document.getElementById('nameInput').value.trim();
      if (!val) { shakeEl(document.querySelector('.input-wrap')); return; }
      userName   = val;
      sayangStep = 0;
      renderSayang();
      showPage('pg-sayang');
    }

    document.getElementById('nameInput').addEventListener('keydown', e => {
      if (e.key === 'Enter') doLogin();
    });

    function shakeEl(el) {
      let n = 0;
      const id = setInterval(() => {
        el.style.transform = n % 2 === 0 ? 'translateX(-8px)' : 'translateX(8px)';
        if (++n > 7) { clearInterval(id); el.style.transform = ''; }
      }, 60);
    }

    // =============================================
    // PAGE 2 – SAYANG QUESTIONS
    // =============================================
    const SAYANG = [
      { yt: 'SAYANG',             ys: 1.1,  yh: '1.8rem', nt: 'ENGGA',  ns: 1.1,  nh: '1.8rem', nv: true  },
      { yt: 'SAYANGG',            ys: 1.35, yh: '2.4rem', nt: 'engga',  ns: 0.85, nh: '1.3rem', nv: true  },
      { yt: 'SAYANGGG',           ys: 1.65, yh: '3rem',   nt: 'engga',  ns: 0.62, nh: '0.95rem',nv: true  },
      { yt: 'SAYANGGG BANGEETTT', ys: 2.0,  yh: '3.8rem', nt: 'engga',  ns: 0.42, nh: '0.65rem',nv: true  },
      { yt: 'SAYANGGG BANGETTT',  ys: 2.5,  yh: '4.5rem', nt: '',       ns: 0,    nh: '0',       nv: false },
    ];

    function renderSayang() {
      const cfg = SAYANG[sayangStep];
      const box = document.getElementById('sayangBtns');
      box.innerHTML = '';

      // YES button
      const yes = document.createElement('button');
      yes.className = 'hbtn';
      yes.style.fontSize = cfg.ys + 'rem';
      yes.style.padding  = `${0.7 + cfg.ys * 0.2}rem ${1.2 + cfg.ys * 0.3}rem`;
      yes.innerHTML = `<span class="hi" style="font-size:${cfg.yh}">❤️</span><span>${cfg.yt}</span>`;
      yes.onclick = () => nextSayang();
      box.appendChild(yes);

      // NO button
      if (cfg.nv) {
        const no = document.createElement('button');
        no.className = 'hbtn no-btn';
        no.style.fontSize = cfg.ns + 'rem';
        no.style.padding  = `${0.4 + cfg.ns * 0.2}rem ${0.8 + cfg.ns * 0.3}rem`;
        no.innerHTML = `<span class="hi" style="font-size:${cfg.nh}">❤️</span><span>${cfg.nt}</span>`;
        no.onclick = () => nextSayang();
        box.appendChild(no);
      }

      box.style.animation = 'none';
      box.offsetHeight;
      box.style.animation = 'fadeInUp 0.4s ease';
    }

    function nextSayang() {
      if (sayangStep < 4) { sayangStep++; renderSayang(); }
      else showPage('pg-marah');
    }

    // =============================================
    // PAGE 3 – MARAH
    // =============================================
    function clickEngga() {
      document.getElementById('afirmasiName').textContent = `Hey ${userName || 'sayang'},`;
      showPage('pg-afirmasi');
    }

    let marahBusy = false;

    function clickMarah(e) {
      if (marahBusy) return;
      marahClicks++;
      const btn  = document.getElementById('btnMarah');
      const card = document.getElementById('marahCard');

      if (marahClicks >= 5) {
        marahBusy = true;
        btn.style.transition = 'transform .45s ease, opacity .45s ease';
        btn.style.transform  = 'scale(0)';
        btn.style.opacity    = '0';
        setTimeout(() => btn.style.display = 'none', 460);
        return;
      }

      // Pastikan card punya posisi relative dan overflow visible
      card.style.position = 'relative';
      card.style.overflow = 'visible';

      // Ubah btn ke absolute dalam card
      if (btn.style.position !== 'absolute') {
        const cRect = card.getBoundingClientRect();
        const bRect = btn.getBoundingClientRect();
        btn.style.position = 'absolute';
        btn.style.margin   = '0';
        btn.style.left     = (bRect.left - cRect.left) + 'px';
        btn.style.top      = (bRect.top  - cRect.top)  + 'px';
        btn.style.zIndex   = '100';
        btn.getBoundingClientRect(); // reflow
      }

      const cW   = card.offsetWidth;
      const cH   = card.offsetHeight;
      const bW   = btn.offsetWidth;
      const bH   = btn.offsetHeight;
      const curX = parseFloat(btn.style.left);
      const curY = parseFloat(btn.style.top);

      // Area dalam card (boleh sedikit keluar pinggir tapi masih kelihatan)
      const minX = -10;
      const minY = -10;
      const maxX = cW - bW + 10;
      const maxY = cH - bH + 10;

      // Cari posisi baru yang minimal 160px dari posisi sekarang
      let newX, newY, tries = 0;
      do {
        newX = minX + Math.random() * (maxX - minX);
        newY = minY + Math.random() * (maxY - minY);
        tries++;
      } while (Math.hypot(newX - curX, newY - curY) < 160 && tries < 30);

      marahBusy = true;
      btn.style.transition = 'left .4s cubic-bezier(.175,.885,.32,1.275), top .4s cubic-bezier(.175,.885,.32,1.275)';
      btn.style.left = newX + 'px';
      btn.style.top  = newY + 'px';

      setTimeout(() => { marahBusy = false; }, 450);
    }

    // =============================================
    // PAGE 4 – AFIRMASI
    // =============================================
    function goToPap() { showPage('pg-pap'); }

    // =============================================
    // PAGE 5 – PAP / UPLOAD
    // =============================================
    function handlePhoto(e) {
      const file = e.target.files[0];
      if (!file) return;
      selectedFile = file;

      const reader = new FileReader();
      reader.onload = ev => {
        document.getElementById('photoPreview').src = ev.target.result;
        document.getElementById('previewName').textContent = '📁 ' + file.name;
        document.getElementById('previewWrap').style.display = 'block';
        document.getElementById('uploadArea').style.display  = 'none';
      };
      reader.readAsDataURL(file);
      document.getElementById('submitBtn').disabled = false;
    }

    async function submitPhoto() {
      if (!selectedFile) return;
      const btn       = document.getElementById('submitBtn');
      const savedInfo = document.getElementById('savedInfo');

      btn.disabled    = true;
      btn.textContent = 'Menyimpan... 💕';

      try {
        const fd = new FormData();
        fd.append('photo', selectedFile);
        fd.append('_token', CSRF);

        const res  = await fetch('/upload-pap', { method: 'POST', body: fd });
        const data = await res.json();

        if (data.success) {
          savedInfo.textContent = '✅ ' + data.message;
          setTimeout(() => showPage('pg-done'), 1600);
        } else {
          throw new Error(data.message || 'Upload gagal.');
        }
      } catch (err) {
        savedInfo.textContent = '❌ ' + err.message;
        btn.disabled    = false;
        btn.textContent = 'Kirim ke Dia 💕';
      }
    }

    // Drag & drop
    const ua = document.getElementById('uploadArea');
    ua.addEventListener('dragover', e => { e.preventDefault(); ua.style.background = 'rgba(255,150,175,0.38)'; });
    ua.addEventListener('dragleave', () => { ua.style.background = ''; });
    ua.addEventListener('drop', e => {
      e.preventDefault();
      ua.style.background = '';
      const file = e.dataTransfer.files[0];
      if (file && file.type.startsWith('image/')) {
        const dt = new DataTransfer();
        dt.items.add(file);
        document.getElementById('papInput').files = dt.files;
        handlePhoto({ target: { files: [file] } });
      }
    });
  </script>
</body>
</html>
