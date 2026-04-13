<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AI Chatbot Presentation</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
:root {
  --gd:  #0d2b1e;
  --g1:  #1a4731;
  --g2:  #2d7a4f;
  --g3:  #4CAF7D;
  --gp:  #a8d5b5;
  --gl:  #e8f5ec;
  --gold:#c9a84c;
  --cre: #faf7f0;
  --tx:  #1a2e20;
  --tw:  #fff;
  --mute:rgba(255,255,255,0.5);
  --card:rgba(255,255,255,0.06);
  --brd: rgba(168,213,181,0.18);
}
*{margin:0;padding:0;box-sizing:border-box;}
html,body{height:100%;font-family:'Inter',sans-serif;overflow:hidden;}

.app {
  display: flex; height: 100vh;
  background: var(--gd);
  position: relative;
}
.app::before {
  content:'';
  position:fixed;inset:0;
  background:
    radial-gradient(ellipse 600px 400px at 80% 20%, rgba(45,122,79,0.12) 0%, transparent 70%),
    radial-gradient(ellipse 400px 600px at 10% 80%, rgba(26,71,49,0.2) 0%, transparent 70%);
  pointer-events:none; z-index:0;
}

/* NAV */
.nav {
  width: 200px; flex-shrink: 0;
  background: rgba(0,0,0,0.3);
  border-right: 1px solid var(--brd);
  display: flex; flex-direction: column;
  overflow-y: auto;
  z-index: 10;
  padding: 16px 12px;
  gap: 8px;
}
.nav-title {
  font-size: 9px; letter-spacing: 2.5px; text-transform: uppercase;
  color: var(--gp); opacity: 0.5;
  padding: 4px 6px 10px; border-bottom: 1px solid var(--brd);
  margin-bottom: 4px; font-weight: 600;
}
.nav-item {
  border-radius: 10px;
  padding: 8px 10px;
  cursor: pointer;
  border: 1px solid transparent;
  transition: all 0.25s;
  position: relative;
  overflow: hidden;
}
.nav-item::before {
  content:'';
  position:absolute;inset:0;
  background: linear-gradient(135deg, rgba(76,175,125,0.08), transparent);
  opacity:0; transition:opacity 0.25s;
}
.nav-item:hover::before, .nav-item.active::before { opacity:1; }
.nav-item.active { border-color: var(--g3); background: rgba(76,175,125,0.1); }
.nav-item:hover:not(.active) { border-color: var(--brd); }
.nav-num { font-size: 9px; font-weight:700; letter-spacing:1px; color: var(--g3); margin-bottom: 2px; }
.nav-label { font-size: 11px; color: rgba(255,255,255,0.7); line-height: 1.3; }

/* SLIDE AREA */
.slide-area {
  flex: 1;
  display: flex; flex-direction: column;
  overflow: hidden;
  position: relative; z-index: 5;
}
.topbar {
  height: 48px; flex-shrink:0;
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 20px;
  border-bottom: 1px solid var(--brd);
  background: rgba(0,0,0,0.2);
}
.tb-left { display:flex; align-items:center; gap:10px; }
.tb-logo { font-size:16px; }
.tb-title { font-size:12px; color:rgba(255,255,255,0.6); font-weight:500; }
.tb-right { display:flex; align-items:center; gap:12px; }
.slide-counter { font-size:11px; color:var(--gp); opacity:0.6; font-weight:600; }
.nav-arrows { display:flex; gap:6px; }
.arr-btn {
  width:28px; height:28px; border-radius:8px;
  background:rgba(255,255,255,0.06);
  border:1px solid var(--brd);
  color:#fff; font-size:13px;
  cursor:pointer; display:flex; align-items:center; justify-content:center;
  transition:all 0.2s;
}
.arr-btn:hover { background:rgba(76,175,125,0.15); border-color:var(--g3); }
.arr-btn:disabled { opacity:0.3; cursor:default; }
.slide-viewport {
  flex:1;
  display: flex; align-items: center; justify-content: center;
  padding: 24px;
  overflow: hidden;
}
.slide {
  width: 100%; max-width: 860px;
  background: var(--card);
  border: 1px solid var(--brd);
  border-radius: 20px;
  padding: 40px 48px;
  backdrop-filter: blur(16px);
  box-shadow: 0 24px 64px rgba(0,0,0,0.4);
  display: none;
  position: relative;
  overflow: hidden;
  max-height: calc(100vh - 180px);
  overflow-y: auto;
}
.slide.active {
  display: block;
  animation: slideEnter 0.55s cubic-bezier(0.22,1,0.36,1) both;
}
@keyframes slideEnter {
  from { opacity:0; transform:translateY(18px) scale(0.98); }
  to   { opacity:1; transform:translateY(0) scale(1); }
}
.slide::-webkit-scrollbar { width:4px; }
.slide::-webkit-scrollbar-track { background:transparent; }
.slide::-webkit-scrollbar-thumb { background:rgba(76,175,125,0.3); border-radius:99px; }
.slide::after {
  content:'';
  position:absolute; top:-40px; right:-40px;
  width:160px; height:240px;
  background: radial-gradient(ellipse, rgba(76,175,125,0.06) 0%, transparent 70%);
  pointer-events:none;
}
.bottombar {
  height: 40px; flex-shrink:0;
  display:flex; align-items:center; justify-content:center;
  gap:8px;
  border-top:1px solid var(--brd);
  background:rgba(0,0,0,0.15);
}
.dot-nav {
  width: 7px; height: 7px; border-radius:50%;
  background: rgba(168,213,181,0.2);
  cursor:pointer; transition:all 0.25s;
}
.dot-nav.active { background:var(--g3); width:22px; border-radius:99px; }
.dot-nav:hover:not(.active) { background:rgba(168,213,181,0.4); }

/* SLIDE CONTENT */
.slide-tag {
  display:inline-flex; align-items:center; gap:6px;
  font-size:10px; font-weight:700; letter-spacing:2px; text-transform:uppercase;
  color:var(--g3); margin-bottom:10px;
  animation: fadeInUp 0.6s 0.1s both;
}
.slide-tag .tag-num {
  background: rgba(76,175,125,0.15);
  border:1px solid rgba(76,175,125,0.3);
  border-radius:6px; padding:2px 7px;
}
h2.slide-title {
  font-family:'Playfair Display',serif;
  font-size: clamp(1.6rem,3vw,2.4rem);
  color:#fff; font-weight:900;
  line-height:1.15; margin-bottom:6px;
  animation: fadeInUp 0.6s 0.15s both;
}
h2.slide-title span { color:var(--gp); }
.slide-sub {
  font-size:16px; color:var(--mute);
  margin-bottom:28px;
  animation: fadeInUp 0.6s 0.2s both;
}
@keyframes fadeInUp {
  from { opacity:0; transform:translateY(14px); }
  to   { opacity:1; transform:translateY(0); }
}
.two-col { display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px; }
.three-col { display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; margin-bottom:20px; }
.block {
  background: rgba(255,255,255,0.04);
  border: 1px solid var(--brd);
  border-radius:14px; padding:18px 20px;
  animation: fadeInUp 0.6s both;
}
.block-icon { font-size:22px; margin-bottom:10px; }
.block-head { font-size:14px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; color:var(--g3); margin-bottom:8px; }
.block-body { font-size:16px; line-height:1.7; color:rgba(255,255,255,0.8); }
.block-body ul { padding-left:16px; }
.block-body ul li { margin-bottom:5px; }
.vs-badge {
  display:flex; align-items:center; justify-content:center;
  font-family:'Playfair Display',serif;
  font-size:1.2rem; font-weight:700;
  color:var(--gold);
  padding: 0 8px;
}

/* GPT FLOW */
.flow {
  display:grid; grid-template-columns:repeat(6,1fr);
  gap:0; margin:20px 0;
  position:relative;
}
.flow::before {
  content:'';
  position:absolute; top:28px; left:8%; right:8%;
  height:2px;
  background: linear-gradient(90deg, var(--g2), var(--g3), var(--gold), var(--g3), var(--g2));
}
.flow-step {
  display:flex; flex-direction:column; align-items:center;
  text-align:center; gap:8px;
  animation: fadeInUp 0.5s both;
}
.flow-icon {
  width:56px; height:56px; border-radius:50%;
  background: linear-gradient(135deg, var(--g1), var(--g2));
  border: 2px solid var(--g3);
  display:flex; align-items:center; justify-content:center;
  font-size:20px; position:relative; z-index:2;
  box-shadow: 0 4px 16px rgba(45,122,79,0.4);
}
.flow-icon.highlight {
  border-color: var(--gold);
  background: linear-gradient(135deg, #3a2a0d, #6b4a1e);
  box-shadow: 0 4px 20px rgba(201,168,76,0.5);
}
.flow-num {
  position:absolute; top:-6px; right:-6px;
  width:18px; height:18px; border-radius:50%;
  background:var(--g3); color:var(--gd);
  font-size:9px; font-weight:800;
  display:flex; align-items:center; justify-content:center;
}
.flow-label { font-size:12px; font-weight:600; color:#fff; line-height:1.3; }
.flow-desc  { font-size:11px; color:var(--mute); line-height:1.4; }

.chat-bubble {
  border-radius:16px; padding:12px 18px;
  margin:8px 0; font-size:16px; line-height:1.6;
  animation: fadeInUp 0.5s both;
}
.chat-bubble.user {
  background:rgba(76,175,125,0.12);
  border:1px solid rgba(76,175,125,0.25);
  color: rgba(255,255,255,0.85);
  margin-right: 30px;
}
.chat-bubble.bot {
  background:rgba(255,255,255,0.06);
  border:1px solid var(--brd);
  color: rgba(255,255,255,0.75);
  margin-left: 30px;
}
.chat-who { font-size:10px; font-weight:700; letter-spacing:1px; margin-bottom:4px; }
.chat-bubble.user .chat-who { color:var(--g3); }
.chat-bubble.bot .chat-who  { color:var(--gp); }

.stat-row { display:flex; gap:10px; flex-wrap:wrap; margin:14px 0; }
.stat-pill {
  background:rgba(76,175,125,0.1);
  border:1px solid rgba(76,175,125,0.2);
  border-radius:99px; padding:6px 14px;
  font-size:14px; color:var(--gp);
  display:flex; align-items:center; gap:6px;
  animation:fadeInUp 0.5s both;
}
.stat-pill strong { font-size:18px; color:var(--g3); font-weight:800; }

.arch-layer {
  background:rgba(255,255,255,0.03);
  border-left:3px solid var(--g3);
  border-radius:0 10px 10px 0;
  padding:12px 16px; margin:8px 0;
  animation:fadeInUp 0.5s both;
}
.arch-layer-name { font-size:13px; font-weight:700; letter-spacing:1px; color:var(--g3); margin-bottom:6px; }
.arch-layer-items { display:flex; flex-wrap:wrap; gap:8px; }
.arch-chip {
  background:rgba(76,175,125,0.1);
  border:1px solid rgba(76,175,125,0.2);
  border-radius:8px; padding:4px 10px;
  font-size:14px; color:rgba(255,255,255,0.8);
}

.info-box {
  border-radius:12px; padding:14px 18px;
  margin:14px 0; font-size:16px; line-height:1.6;
  animation:fadeInUp 0.5s both;
}
.info-box.warn {
  background:rgba(201,168,76,0.08);
  border:1px solid rgba(201,168,76,0.25);
  color:rgba(255,255,255,0.75);
}
.info-box.success {
  background:rgba(76,175,125,0.1);
  border:1px solid rgba(76,175,125,0.25);
  color:rgba(255,255,255,0.8);
}
.info-box.accent {
  background:rgba(45,122,79,0.15);
  border:1px solid rgba(45,122,79,0.3);
  color:#fff; font-family:'Playfair Display',serif;
  font-size:17px; font-style:italic;
  text-align:center;
}

/* CHATBOT PANEL */
.chat-panel {
  width: 300px; flex-shrink:0;
  background:rgba(0,0,0,0.35);
  border-left:1px solid var(--brd);
  display:flex; flex-direction:column;
  z-index:10;
  transition: width 0.3s cubic-bezier(0.22,1,0.36,1), opacity 0.3s;
  overflow: hidden;
}
.chat-panel.collapsed {
  width: 0;
  opacity: 0;
  border-left: none;
}

/* Toggle button floating */
.chat-toggle-btn {
  position: fixed;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  z-index: 20;
  width: 22px;
  height: 56px;
  background: rgba(45,122,79,0.85);
  border: 1px solid var(--g3);
  border-right: none;
  border-radius: 10px 0 0 10px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-size: 13px;
  transition: all 0.2s;
  box-shadow: -3px 0 12px rgba(45,122,79,0.3);
}
.chat-toggle-btn:hover {
  background: var(--g3);
  width: 26px;
}
.chat-panel.collapsed ~ .chat-toggle-btn,
.chat-toggle-btn.open {
  right: 300px;
}
.chat-panel.collapsed ~ .chat-toggle-btn {
  right: 0;
}

.cp-header {
  padding:14px 16px;
  border-bottom:1px solid var(--brd);
  display:flex; align-items:center; gap:10px;
  background:rgba(0,0,0,0.2);
  flex-shrink:0;
}
.cp-avatar {
  width:36px;height:36px;border-radius:50%;
  background:linear-gradient(135deg,var(--g2),var(--g3));
  display:flex;align-items:center;justify-content:center;
  font-size:16px; flex-shrink:0;
  box-shadow:0 4px 12px rgba(45,122,79,0.4);
}
.cp-info { flex:1; min-width:0; }
.cp-name { font-size:13px; font-weight:600; color:#fff; }
.cp-status { font-size:10px; color:var(--g3); display:flex; align-items:center; gap:4px; }
.status-dot { width:6px;height:6px;border-radius:50%;background:var(--g3);animation:pulse 2s infinite; }
@keyframes pulse{0%,100%{opacity:1}50%{opacity:0.4}}

.cp-messages {
  flex:1; overflow-y:auto;
  padding:14px 14px 8px;
  display:flex; flex-direction:column; gap:10px;
  min-height:0;
}
.cp-messages::-webkit-scrollbar{width:3px;}
.cp-messages::-webkit-scrollbar-thumb{background:rgba(76,175,125,0.3);border-radius:99px;}

.msg { animation:msgIn 0.35s cubic-bezier(0.22,1,0.36,1) both; }
@keyframes msgIn { from{opacity:0;transform:translateY(8px)} to{opacity:1;transform:translateY(0)} }
.msg.bot  { align-self:flex-start; max-width:95%; }
.msg.user { align-self:flex-end;   max-width:85%; }

.msg-bubble {
  border-radius:12px; padding:9px 12px;
  font-size:12.5px; line-height:1.6;
  word-break:break-word;
}
.msg.bot .msg-bubble {
  background:rgba(255,255,255,0.07);
  border:1px solid var(--brd);
  color:rgba(255,255,255,0.85);
  border-radius:4px 12px 12px 12px;
}
.msg.user .msg-bubble {
  background:linear-gradient(135deg,var(--g1),var(--g2));
  color:#fff;
  border-radius:12px 4px 12px 12px;
  border:1px solid rgba(76,175,125,0.2);
}
.msg-time { font-size:9px; color:rgba(255,255,255,0.25); margin-top:3px; padding: 0 2px; }

.typing-indicator .msg-bubble {
  display:flex; gap:4px; align-items:center;
  padding:10px 14px;
}
.typing-dot {
  width:6px;height:6px;border-radius:50%;
  background:var(--gp); opacity:0.6;
  animation:typingDot 1.2s infinite;
}
.typing-dot:nth-child(2){animation-delay:0.2s;}
.typing-dot:nth-child(3){animation-delay:0.4s;}
@keyframes typingDot{0%,80%,100%{transform:translateY(0)}40%{transform:translateY(-5px)}}

.cp-quick {
  padding: 8px 12px;
  border-top:1px solid var(--brd);
  display:flex; flex-wrap:wrap; gap:6px;
  flex-shrink:0;
}
.quick-btn {
  background:rgba(76,175,125,0.08);
  border:1px solid rgba(76,175,125,0.2);
  border-radius:99px; padding:4px 10px;
  font-size:10px; color:var(--gp);
  cursor:pointer; transition:all 0.2s;
  font-family:'Inter',sans-serif;
}
.quick-btn:hover { background:rgba(76,175,125,0.18); border-color:var(--g3); color:#fff; }

.cp-input-area {
  padding:10px 12px;
  border-top:1px solid var(--brd);
  display:flex; gap:8px; align-items:flex-end;
  flex-shrink:0;
}
.cp-textarea {
  flex:1;
  background:rgba(255,255,255,0.06);
  border:1px solid var(--brd);
  border-radius:10px; padding:9px 12px;
  font-size:12px; color:#fff;
  font-family:'Inter',sans-serif;
  resize:none; outline:none;
  min-height:36px; max-height:80px;
  transition:border-color 0.2s;
  line-height:1.4;
}
.cp-textarea::placeholder{color:rgba(255,255,255,0.3);}
.cp-textarea:focus{border-color:var(--g3);}
.cp-send {
  width:34px;height:34px;border-radius:10px;flex-shrink:0;
  background:linear-gradient(135deg,var(--g2),var(--g3));
  border:none; color:#fff; font-size:14px;
  cursor:pointer; display:flex;align-items:center;justify-content:center;
  transition:all 0.2s;
  box-shadow:0 4px 12px rgba(45,122,79,0.3);
}
.cp-send:hover{transform:scale(1.08);box-shadow:0 6px 16px rgba(45,122,79,0.5);}
.cp-send:disabled{opacity:0.4;cursor:default;transform:none;}

/* end chat styles */
</style>
</head>
<body>
<div class="app">

  <!-- NAV -->
  <nav class="nav" id="nav">
    <div class="nav-title">🌿 Slide Navigator</div>
  </nav>

  <!-- SLIDE AREA -->
  <div class="slide-area">
    <div class="topbar">
      <div class="tb-left">
        <span class="tb-logo">🌿</span>
        <span class="tb-title">AI Chatbot — Sejarah, Teknologi &amp; Aplikasi</span>
      </div>
      <div class="tb-right">
        <span class="slide-counter" id="slideCounter">1 / 6</span>
        <div class="nav-arrows">
          <button class="arr-btn" id="btnPrev" onclick="goSlide(current-1)">‹</button>
          <button class="arr-btn" id="btnNext" onclick="goSlide(current+1)">›</button>
        </div>
      </div>
    </div>

    <div class="slide-viewport" id="viewport">

      <!-- ======================== SLIDE 1 ======================== -->
      <div class="slide active" id="s1">
        <div class="slide-tag"><span class="tag-num">01</span>Pengertian &amp; Pengantar</div>
        <h2 class="slide-title">Apa Itu <span>Chatbot?</span></h2>
        <p class="slide-sub">Mata Kuliah Artificial Intelligence · Dosen: Lucky Lhaura Van FC</p>

        <div class="info-box accent" style="animation-delay:0.15s">
          💬 <em>"A computer program designed to simulate conversation with human users, especially over the Internet"</em><br>
          <span style="font-size:13px;opacity:0.7;">— Lexico Dictionaries, dikutip oleh Adamopoulou &amp; Moussiades (2020)</span>
        </div>

        <div class="two-col" style="margin-top:14px">
          <div class="block" style="animation-delay:0.25s">
            <div class="block-head">Definisi Chatbot</div>
            <div class="block-body">
              Chatbot adalah <strong>program kecerdasan buatan (AI)</strong> dan model <strong>Human–Computer Interaction (HCI)</strong>. Chatbot menggunakan <strong>Natural Language Processing (NLP)</strong> dan analisis sentimen untuk berkomunikasi dalam bahasa manusia melalui teks atau ucapan lisan. Juga dikenal sebagai: <em>interactive agent, smart bot, digital assistant,</em> atau <em>artificial conversation entity</em>.
            </div>
          </div>
          <div class="block" style="animation-delay:0.35s">
            <div class="block-head">Peta Materi Presentasi</div>
            <div class="block-body">
              <ul>
                <li>01 — Pengertian &amp; Pengantar Chatbot</li>
                <li>02 — Evolusi Chatbot (Sejarah)</li>
                <li>03 — Arsitektur Sistem Chatbot</li>
                <li>04 — Cara Alur Kerja Chatbot</li>
                <li>05 — Studi Kasus Aplikasi</li>
                <li>06 — Kesimpulan</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="two-col">
          <div class="block" style="animation-delay:0.45s">
            <div class="block-head">Motivasi &amp; Manfaat</div>
            <div class="block-body">
              <ul>
                <li><strong>Produktivitas:</strong> Motivasi utama penggunaan chatbot</li>
                <li><strong>Bisnis:</strong> Mengurangi biaya layanan &amp; melayani banyak pelanggan sekaligus</li>
                <li><strong>Pendidikan, e-commerce, kesehatan</strong> &amp; hiburan</li>
                <li>40% permintaan pengguna bersifat <strong>emosional</strong>, bukan sekadar informasi</li>
              </ul>
            </div>
          </div>
          <div class="block" style="animation-delay:0.55s">
            <div class="block-head">Kategori Chatbot</div>
            <div class="block-body">
              <ul>
                <li><strong>Domain Pengetahuan:</strong> Generic, Open-Domain, Closed-Domain</li>
                <li><strong>Tujuan:</strong> Informative, Conversational, Task-based</li>
                <li><strong>Metode Respons:</strong> Rule-based, Retrieval-based, Generative</li>
                <li><strong>Saluran:</strong> Teks, Suara, Gambar</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="stat-row" style="animation-delay:0.65s">
          <div class="stat-pill"><strong>NLP</strong> Teknologi Inti</div>
          <div class="stat-pill"><strong>HCI</strong> Model Interaksi</div>
          <div class="stat-pill"><strong>24/7</strong> Operasional</div>
          <div class="stat-pill"><strong>AI</strong> Berbasis ML &amp; Deep Learning</div>
        </div>
      </div>

      <!-- ======================== SLIDE 2 ======================== -->
      <div class="slide" id="s2">
        <div class="slide-tag"><span class="tag-num">02</span>Sejarah</div>
        <h2 class="slide-title">Evolusi <span>Chatbot</span></h2>
        <p class="slide-sub">Dari Turing Test (1950) hingga Voice Assistant &amp; AI Generatif modern</p>

        <!-- Timeline Row 1 -->
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-bottom:10px;animation:fadeInUp 0.5s 0.2s both;">
          <div class="block" style="padding:12px 14px;border-color:rgba(201,168,76,0.3)">
            <div style="font-size:13px;font-weight:800;color:var(--gold);margin-bottom:4px;">1950</div>
            <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:4px;">Turing Test</div>
            <div style="font-size:13px;color:var(--mute);line-height:1.5;">Alan Turing: bisakah komputer berbicara tanpa disadari? — Ide dasar chatbot lahir.</div>
          </div>
          <div class="block" style="padding:12px 14px;">
            <div style="font-size:13px;font-weight:800;color:var(--g3);margin-bottom:4px;">1966</div>
            <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:4px;">ELIZA</div>
            <div style="font-size:13px;color:var(--mute);line-height:1.5;">Chatbot pertama — mensimulasi psikolog via <em>pattern matching</em>. Basis: 200 kata kunci &amp; template.</div>
          </div>
          <div class="block" style="padding:12px 14px;">
            <div style="font-size:13px;font-weight:800;color:var(--g3);margin-bottom:4px;">1972</div>
            <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:4px;">PARRY</div>
            <div style="font-size:13px;color:var(--mute);line-height:1.5;">Simulasi pasien skizofrenia. Punya "kepribadian" &amp; respon emosional berbasis bobot ujaran.</div>
          </div>
          <div class="block" style="padding:12px 14px;">
            <div style="font-size:13px;font-weight:800;color:var(--g3);margin-bottom:4px;">1988</div>
            <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:4px;">Jabberwacky</div>
            <div style="font-size:13px;color:var(--mute);line-height:1.5;">AI pertama di dunia chatbot. Gunakan <em>contextual pattern matching</em> berbasis percakapan sebelumnya.</div>
          </div>
        </div>

        <!-- Timeline Row 2 -->
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-bottom:10px;animation:fadeInUp 0.5s 0.35s both;">
          <div class="block" style="padding:12px 14px;">
            <div style="font-size:13px;font-weight:800;color:var(--g3);margin-bottom:4px;">1995</div>
            <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:4px;">ALICE &amp; AIML</div>
            <div style="font-size:13px;color:var(--mute);line-height:1.5;">Chatbot online pertama. Basis AIML: 41.000+ template. Raih Loebner Prize.</div>
          </div>
          <div class="block" style="padding:12px 14px;">
            <div style="font-size:13px;font-weight:800;color:var(--g3);margin-bottom:4px;">2001</div>
            <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:4px;">SmarterChild</div>
            <div style="font-size:13px;color:var(--mute);line-height:1.5;">Chatbot pertama bantu tugas harian: jadwal film, skor olahraga, berita via AOL/MSN.</div>
          </div>
          <div class="block" style="padding:12px 14px;border-color:rgba(76,175,125,0.4)">
            <div style="font-size:13px;font-weight:800;color:var(--g3);margin-bottom:4px;">2010–2016</div>
            <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:4px;">Voice Assistants</div>
            <div style="font-size:13px;color:var(--mute);line-height:1.5;">Apple Siri (2010), IBM Watson (2011), Google Assistant (2016), Amazon Alexa (2014).</div>
          </div>
          <div class="block" style="padding:12px 14px;border-color:rgba(76,175,125,0.5);background:rgba(76,175,125,0.07)">
            <div style="font-size:13px;font-weight:800;color:var(--g3);margin-bottom:4px;">2016 → Kini</div>
            <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:4px;">AI Generatif ★</div>
            <div style="font-size:13px;color:var(--mute);line-height:1.5;">34.000+ chatbot (2016). Chatbot berbasis ML, NLP, Transformer &amp; Large Language Model.</div>
          </div>
        </div>

        <div class="two-col" style="animation:fadeInUp 0.5s 0.5s both;">
          <div class="block" style="border-color:rgba(200,80,80,0.3)">
            <div class="block-head" style="color:#e07070">🔴 Pattern Matching (Rule-Based)</div>
            <div class="block-body">ELIZA, ALICE, AIML — cocokkan input ke aturan tetap. Cepat, tapi tidak bisa belajar. Gagal di luar domain yang sudah didefinisikan.</div>
          </div>
          <div class="block" style="border-color:rgba(76,175,125,0.4)">
            <div class="block-head">🟢 Machine Learning Approach</div>
            <div class="block-body">Gunakan NLP &amp; Neural Network (RNN, LSTM, Transformer). Belajar dari konteks percakapan, tidak butuh aturan tetap, generatif &amp; adaptif.</div>
          </div>
        </div>
      </div>

      <!-- ======================== SLIDE 3 ======================== -->
      <div class="slide" id="s3">
        <div class="slide-tag"><span class="tag-num">03</span>Arsitektur</div>
        <h2 class="slide-title">Arsitektur <span>Sistem Chatbot</span></h2>
        <p class="slide-sub">Komponen utama berdasarkan Adamopoulou &amp; Moussiades (2020) — Elsevier Machine Learning with Applications</p>

        <!-- ===== DIAGRAM IMAGE FROM ARTICLE (TOP) ===== -->
        <div style="animation:fadeInUp 0.5s 0.1s both;margin-bottom:14px;">
          <div style="display:flex;justify-content:flex-end;margin-bottom:6px;">
            <div style="background:rgba(201,168,76,0.1);border:1px solid rgba(201,168,76,0.35);border-radius:8px;padding:5px 11px;font-size:9px;color:var(--gold);display:flex;align-items:center;gap:5px;">
              <span>📘</span>
              <span><strong>Adamopoulou &amp; Moussiades (2020)</strong> — Fig. 8 · Machine Learning with Applications, Elsevier</span>
            </div>
          </div>
          <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(168,213,181,0.2);border-radius:12px;padding:10px;text-align:center;">
            <img src="data:image/jpeg;base64,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"
              alt="Arsitektur Chatbot Adamopoulou & Moussiades 2020 Fig.8"
              style="width:100%;max-width:740px;border-radius:8px;box-shadow:0 6px 24px rgba(0,0,0,0.45);display:block;margin:0 auto;" />
          </div>
        </div>

        <!-- ===== SVG DIAGRAM (Adaptasi Fig.8 Artikel) ===== -->
        <div style="background:rgba(0,0,0,0.22);border:1px solid rgba(168,213,181,0.12);border-radius:12px;padding:12px 14px;margin-bottom:14px;animation:fadeInUp 0.5s 0.25s both;">
          <div style="font-size:9px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--gp);opacity:0.5;margin-bottom:8px;">📐 Diagram Alur Arsitektur (Adaptasi)</div>
          <svg viewBox="0 0 760 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;font-family:'Inter',sans-serif;display:block;">
            <defs>
              <marker id="ar3" markerWidth="7" markerHeight="7" refX="5" refY="3.5" orient="auto">
                <polygon points="0 0,7 3.5,0 7" fill="rgba(255,255,255,0.5)"/>
              </marker>
              <linearGradient id="gUI" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#1e5ba0"/><stop offset="100%" stop-color="#0d3060"/>
              </linearGradient>
              <linearGradient id="gUMA" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#2a6a40"/><stop offset="100%" stop-color="#1a4731"/>
              </linearGradient>
              <linearGradient id="gDLG" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#1e4d7a"/><stop offset="100%" stop-color="#0d2b50"/>
              </linearGradient>
              <linearGradient id="gRGC" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#2d5a45"/><stop offset="100%" stop-color="#1a3a2a"/>
              </linearGradient>
              <linearGradient id="gBE" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#1a5c30"/><stop offset="100%" stop-color="#0d3018"/>
              </linearGradient>
            </defs>

            <!-- ═══ USER INTERFACE COMPONENT (LEFT PANEL) ═══ -->
            <rect x="4" y="10" width="132" height="265" rx="8" fill="url(#gUI)" stroke="#6eb5ff" stroke-width="1.5"/>
            <rect x="4" y="10" width="132" height="22" rx="8" fill="rgba(110,181,255,0.2)"/>
            <rect x="4" y="24" width="132" height="8" fill="rgba(110,181,255,0.2)"/>
            <text x="70" y="19" text-anchor="middle" font-size="7" fill="#6eb5ff" font-weight="800" letter-spacing="0.5">USER INTERFACE</text>
            <text x="70" y="29" text-anchor="middle" font-size="7" fill="#6eb5ff" font-weight="800" letter-spacing="0.5">COMPONENT</text>
            <!-- Messages Input Field -->
            <rect x="14" y="70" width="112" height="40" rx="7" fill="rgba(0,200,190,0.18)" stroke="#00c8be" stroke-width="1.5"/>
            <text x="70" y="88" text-anchor="middle" font-size="7.5" fill="#00c8be" font-weight="700">Messages Input</text>
            <text x="70" y="100" text-anchor="middle" font-size="7.5" fill="#00c8be" font-weight="700">Field</text>
            <!-- Responsive Display Area -->
            <rect x="14" y="190" width="112" height="50" rx="7" fill="rgba(0,200,190,0.18)" stroke="#00c8be" stroke-width="1.5"/>
            <text x="70" y="211" text-anchor="middle" font-size="7.5" fill="#00c8be" font-weight="700">Responsive</text>
            <text x="70" y="223" text-anchor="middle" font-size="7.5" fill="#00c8be" font-weight="700">Display Area</text>

            <!-- ═══ BIG GREEN CONTAINER (RIGHT) ═══ -->
            <rect x="150" y="4" width="606" height="245" rx="10" fill="rgba(45,122,79,0.08)" stroke="rgba(76,175,125,0.35)" stroke-width="1.5" stroke-dasharray="5,3"/>

            <!-- ═══ USER MESSAGE ANALYSIS COMPONENT ═══ -->
            <rect x="165" y="14" width="582" height="130" rx="8" fill="rgba(45,100,60,0.25)" stroke="#4CAF7D" stroke-width="1.5"/>
            <rect x="165" y="14" width="582" height="20" rx="8" fill="rgba(76,175,125,0.2)"/>
            <rect x="165" y="26" width="582" height="8" fill="rgba(76,175,125,0.2)"/>
            <text x="456" y="22" text-anchor="middle" font-size="7.5" fill="#4CAF7D" font-weight="800" letter-spacing="0.8">USER MESSAGE ANALYSIS COMPONENT</text>
            <line x1="165" y1="34" x2="747" y2="34" stroke="rgba(76,175,125,0.2)" stroke-width="1"/>
            <!-- Language Services (orange) -->
            <rect x="430" y="40" width="300" height="72" rx="7" fill="rgba(201,120,40,0.22)" stroke="#e08844" stroke-width="1.5"/>
            <rect x="430" y="40" width="300" height="16" rx="7" fill="rgba(201,120,40,0.3)"/>
            <text x="580" y="51" text-anchor="middle" font-size="7.5" fill="#e08844" font-weight="800">Language Services</text>
            <text x="445" y="70" font-size="7.5" fill="rgba(255,255,255,0.7)">● Spell Checker</text>
            <text x="445" y="83" font-size="7.5" fill="rgba(255,255,255,0.7)">● Translator</text>
            <text x="445" y="96" font-size="7.5" fill="rgba(255,255,255,0.7)">● Sentiment Analysis</text>
            <!-- Intent Classification -->
            <rect x="175" y="95" width="118" height="38" rx="6" fill="rgba(180,40,40,0.3)" stroke="#e07070" stroke-width="1.5"/>
            <text x="234" y="112" text-anchor="middle" font-size="7.5" fill="#e07070" font-weight="700">Intent</text>
            <text x="234" y="125" text-anchor="middle" font-size="7.5" fill="#e07070" font-weight="700">Classification</text>
            <!-- Double arrow -->
            <line x1="293" y1="114" x2="315" y2="114" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" marker-end="url(#ar3)"/>
            <line x1="315" y1="120" x2="293" y2="120" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" marker-end="url(#ar3)"/>
            <!-- Entity -->
            <rect x="318" y="95" width="100" height="38" rx="6" fill="rgba(180,40,40,0.3)" stroke="#e07070" stroke-width="1.5"/>
            <text x="368" y="118" text-anchor="middle" font-size="7.5" fill="#e07070" font-weight="700">Entity</text>

            <!-- ═══ DIALOG MANAGEMENT ═══ -->
            <rect x="350" y="160" width="220" height="76" rx="8" fill="url(#gDLG)" stroke="#6eb5ff" stroke-width="1.5"/>
            <rect x="350" y="160" width="220" height="18" rx="8" fill="rgba(110,181,255,0.18)"/>
            <rect x="350" y="170" width="220" height="8" fill="rgba(110,181,255,0.18)"/>
            <text x="460" y="172" text-anchor="middle" font-size="7.5" fill="#6eb5ff" font-weight="800" letter-spacing="0.8">DIALOG MANAGEMENT</text>
            <line x1="350" y1="178" x2="570" y2="178" stroke="rgba(110,181,255,0.2)" stroke-width="1"/>
            <!-- Inner box -->
            <rect x="362" y="182" width="195" height="48" rx="6" fill="rgba(255,220,160,0.1)" stroke="rgba(255,200,120,0.3)" stroke-width="1"/>
            <text x="459" y="197" text-anchor="middle" font-size="7.5" fill="rgba(255,255,255,0.75)">Ambiguity Handling</text>
            <text x="459" y="210" text-anchor="middle" font-size="7.5" fill="rgba(255,255,255,0.75)">Data Handling</text>
            <text x="459" y="223" text-anchor="middle" font-size="7.5" fill="rgba(255,255,255,0.75)">Error Handling</text>

            <!-- ═══ RESPONSE GENERATION ═══ -->
            <rect x="165" y="160" width="172" height="76" rx="8" fill="url(#gRGC)" stroke="#4CAF7D" stroke-width="1.5"/>
            <rect x="165" y="160" width="172" height="18" rx="8" fill="rgba(76,175,125,0.2)"/>
            <rect x="165" y="170" width="172" height="8" fill="rgba(76,175,125,0.2)"/>
            <text x="251" y="172" text-anchor="middle" font-size="7.5" fill="#4CAF7D" font-weight="800">RESPONSE GENERATION</text>
            <text x="251" y="184" text-anchor="middle" font-size="7.5" fill="#4CAF7D" font-weight="800">COMPONENT</text>
            <text x="175" y="200" font-size="7" fill="rgba(255,255,255,0.65)">▸ Rule-based Model</text>
            <text x="175" y="213" font-size="7" fill="rgba(255,255,255,0.65)">▸ Retrieval-based Model</text>
            <text x="175" y="226" font-size="7" fill="rgba(255,255,255,0.65)">▸ Generative Model (NLG)</text>

            <!-- ═══ BACKEND ═══ -->
            <rect x="350" y="258" width="220" height="42" rx="8" fill="url(#gBE)" stroke="#4CAF7D" stroke-width="1.5"/>
            <rect x="350" y="258" width="220" height="14" rx="8" fill="rgba(76,175,125,0.25)"/>
            <text x="460" y="268" text-anchor="middle" font-size="7.5" fill="#4CAF7D" font-weight="800" letter-spacing="0.8">BACKEND</text>
            <line x1="350" y1="272" x2="570" y2="272" stroke="rgba(76,175,125,0.2)" stroke-width="1"/>
            <text x="380" y="286" font-size="7" fill="rgba(255,255,255,0.7)">■ Databases (DB)</text>
            <text x="480" y="286" font-size="7" fill="rgba(255,255,255,0.7)">■ Information System (IS)</text>

            <!-- ═══ ARROWS ═══ -->
            <!-- User Input: Messages Field → UMA -->
            <line x1="126" y1="90" x2="162" y2="90" stroke="rgba(255,255,255,0.5)" stroke-width="1.8" marker-end="url(#ar3)"/>
            <text x="140" y="86" text-anchor="middle" font-size="6.5" fill="rgba(255,255,255,0.45)">User</text>
            <text x="140" y="98" text-anchor="middle" font-size="6.5" fill="rgba(255,255,255,0.45)">Input</text>
            <!-- UMA → Dialog (Context Info, down) -->
            <line x1="460" y1="144" x2="460" y2="157" stroke="rgba(255,255,255,0.45)" stroke-width="1.8" marker-end="url(#ar3)"/>
            <text x="475" y="153" font-size="6.5" fill="rgba(255,255,255,0.4)">Context Info</text>
            <!-- Dialog → API Call → Backend -->
            <line x1="460" y1="236" x2="460" y2="255" stroke="rgba(255,255,255,0.45)" stroke-width="1.8" marker-end="url(#ar3)"/>
            <text x="468" y="249" font-size="6.5" fill="rgba(255,255,255,0.4)">API Call</text>
            <!-- Dialog → Response Generation -->
            <line x1="350" y1="200" x2="340" y2="200" stroke="rgba(255,255,255,0.45)" stroke-width="1.8" marker-end="url(#ar3)"/>
            <!-- ChatBot Response: Response Gen → Responsive Display -->
            <line x1="165" y1="210" x2="130" y2="210" stroke="rgba(255,255,255,0.5)" stroke-width="1.8" marker-end="url(#ar3)"/>
            <text x="148" y="205" text-anchor="middle" font-size="6" fill="rgba(255,255,255,0.4)">Chat Bot</text>
            <text x="148" y="218" text-anchor="middle" font-size="6" fill="rgba(255,255,255,0.4)">Response</text>
          </svg>
        </div>

        <!-- ===== COMPONENT DESCRIPTIONS (BOTTOM) ===== -->
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;animation:fadeInUp 0.6s 0.4s both;">

          <div class="arch-layer" style="border-color:#6eb5ff;padding:10px 14px;">
            <div class="arch-layer-name" style="color:#6eb5ff;font-size:12px;">📱 User Interface Component</div>
            <div class="block-body" style="font-size:14px;">
              Titik masuk pengguna: <strong>Messages Input Field</strong> mengirim teks/suara ke sistem.
              <strong>Responsive Display Area</strong> menampilkan balasan chatbot. Saluran: Facebook, WhatsApp, Slack, WeChat, Viber, Skype.
            </div>
          </div>

          <div class="arch-layer" style="border-color:#4CAF7D;padding:10px 14px;">
            <div class="arch-layer-name" style="color:#4CAF7D;font-size:12px;">🧠 User Message Analysis Component</div>
            <div class="block-body" style="font-size:14px;">
              <strong>Language Services:</strong> Spell Checker, Translator, Sentiment Analysis.
              <strong>Intent Classification</strong> mendeteksi tujuan pengguna; <strong>Entity Extraction</strong> menangkap siapa/apa/kapan/di mana.
            </div>
          </div>

          <div class="arch-layer" style="border-color:#c9a84c;padding:10px 14px;">
            <div class="arch-layer-name" style="color:#c9a84c;font-size:12px;">⚙️ Dialog Management Component ⭐ Inti Sistem</div>
            <div class="block-body" style="font-size:14px;">
              Mengelola konteks percakapan. <strong>Ambiguity Handling</strong> (tangani input tidak jelas),
              <strong>Data Handling</strong> (simpan info user), <strong>Error Handling</strong> (cegah error).
              Menghubungkan ke Backend via <em>API Call</em>.
            </div>
          </div>

          <div class="arch-layer" style="border-color:#4CAF7D;padding:10px 14px;">
            <div class="arch-layer-name" style="font-size:12px;">🗄️ Response Generation + Backend</div>
            <div class="block-body" style="font-size:14px;">
              <strong>Response Generation</strong>: hasilkan jawaban via Rule-based, Retrieval-based, atau Generative model.
              <strong>Backend</strong>: menyimpan Databases (DB) &amp; Information System (IS) — diakses melalui API Call.
            </div>
          </div>

        </div>
      </div>

      <!-- ======================== SLIDE 4 ======================== -->
      <div class="slide" id="s4">
        <div class="slide-tag"><span class="tag-num">04</span>Cara Kerja</div>
        <h2 class="slide-title">Alur <span>Cara Kerja Chatbot</span></h2>
        <p class="slide-sub">Pipeline lengkap dari input pengguna hingga respons — berdasarkan arsitektur Adamopoulou &amp; Moussiades (2020)</p>

        <div class="chat-bubble user" style="animation-delay:0.1s">
          <div class="chat-who">👤 PENGGUNA</div>
          "Saya ingin memesan tiket kereta dari Jakarta ke Bandung untuk besok."
        </div>

        <!-- 6-step chatbot workflow flow -->
        <div class="flow" style="animation:fadeInUp 0.6s 0.2s both">
          <div class="flow-step" style="animation-delay:0.25s">
            <div class="flow-icon"><span class="flow-num">1</span>💬</div>
            <div class="flow-label">USER INPUT</div>
            <div class="flow-desc">Teks/suara via UI (WA, Slack, Web)</div>
          </div>
          <div class="flow-step" style="animation-delay:0.35s">
            <div class="flow-icon"><span class="flow-num">2</span>🔍</div>
            <div class="flow-label">MSG ANALYSIS</div>
            <div class="flow-desc">Spell Check → Translate → Sentiment</div>
          </div>
          <div class="flow-step" style="animation-delay:0.45s">
            <div class="flow-icon"><span class="flow-num">3</span>🧠</div>
            <div class="flow-label">INTENT + ENTITY</div>
            <div class="flow-desc">Intent: pesan tiket · Entity: Jakarta, Bandung, besok</div>
          </div>
          <div class="flow-step" style="animation-delay:0.55s">
            <div class="flow-icon highlight"><span class="flow-num">4</span>⚙️</div>
            <div class="flow-label">DIALOG MGR</div>
            <div class="flow-desc">Tangani ambiguitas &amp; update konteks</div>
          </div>
          <div class="flow-step" style="animation-delay:0.65s">
            <div class="flow-icon"><span class="flow-num">5</span>🗄️</div>
            <div class="flow-label">BACKEND / API</div>
            <div class="flow-desc">Query DB tiket kereta · API eksternal</div>
          </div>
          <div class="flow-step" style="animation-delay:0.75s">
            <div class="flow-icon"><span class="flow-num">6</span>✅</div>
            <div class="flow-label">RESPONS</div>
            <div class="flow-desc">NLG hasilkan balasan natural ke user</div>
          </div>
        </div>

        <div class="chat-bubble bot" style="animation-delay:0.85s">
          <div class="chat-who">🤖 CHATBOT</div>
          "Tersedia kereta Argo Parahyangan Jakarta–Bandung besok. Kelas Eksekutif Rp 200.000, Bisnis Rp 120.000. Mau saya lanjutkan pemesanan?" ✅
        </div>

        <div class="two-col" style="margin-top:16px">
          <div class="block" style="animation-delay:0.9s; border-color:rgba(79,184,212,0.4)">
            <div class="block-head" style="color:#4fb8d4">🔤 NLU — Natural Language Understanding</div>
            <div class="block-body">
              Chatbot menggunakan NLU untuk memahami teks:
              <ul style="margin-top:8px">
                <li><strong>Intent Classification:</strong> Apa tujuan pengguna? (pesan tiket, cek saldo, FAQ…)</li>
                <li><strong>Entity Extraction:</strong> Siapa/Apa/Kapan/Dimana? (Named Entity Recognition)</li>
                <li><strong>Context:</strong> String yang menyimpan referensi percakapan sebelumnya</li>
              </ul>
            </div>
          </div>
          <div class="block" style="animation-delay:1.0s; border-color:rgba(176,110,240,0.4)">
            <div class="block-head" style="color:#b06ef0">✍️ NLG — Natural Language Generation</div>
            <div class="block-body">
              Tiga model pembangkit respons:
              <ul style="margin-top:8px">
                <li><strong>Rule-based:</strong> Pilih dari template aturan tetap</li>
                <li><strong>Retrieval-based:</strong> Cari respons terbaik dari database via API</li>
                <li><strong>Generative:</strong> Buat teks baru dengan model bahasa (Seq2Seq, Transformer)</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- ======================== SLIDE 5 ======================== -->
      <div class="slide" id="s5">
        <div class="slide-tag"><span class="tag-num">05</span>Studi Kasus</div>
        <h2 class="slide-title">Studi Kasus: <span>ChatGPT vs DeepSeek</span></h2>
        <p class="slide-sub">Perbandingan dua model AI generatif terkemuka — ChatGPT (OpenAI) &amp; DeepSeek (DeepSeek AI)</p>

        <!-- VS HEADER -->
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;animation:fadeInUp 0.5s 0.1s both;">
          <div style="flex:1;background:rgba(16,163,127,0.12);border:1px solid rgba(16,163,127,0.35);border-radius:12px;padding:12px 16px;text-align:center;">
            <div style="font-size:28px;">🤖</div>
            <div style="font-size:15px;font-weight:800;color:#10a37f;letter-spacing:1px;margin-top:4px;">ChatGPT</div>
            <div style="font-size:11px;color:rgba(255,255,255,0.5);margin-top:2px;">OpenAI · San Francisco, USA</div>
          </div>
          <div class="vs-badge" style="font-size:1.5rem;">VS</div>
          <div style="flex:1;background:rgba(99,102,241,0.12);border:1px solid rgba(99,102,241,0.35);border-radius:12px;padding:12px 16px;text-align:center;">
            <div style="font-size:28px;">🐋</div>
            <div style="font-size:15px;font-weight:800;color:#8b8cf8;letter-spacing:1px;margin-top:4px;">DeepSeek</div>
            <div style="font-size:11px;color:rgba(255,255,255,0.5);margin-top:2px;">DeepSeek AI · Hangzhou, China</div>
          </div>
        </div>

        <!-- PROFIL & SEJARAH -->
        <div class="two-col" style="animation:fadeInUp 0.5s 0.2s both;">
          <div class="block" style="border-color:rgba(16,163,127,0.4)">
            <div class="block-head" style="color:#10a37f">📜 Profil &amp; Sejarah ChatGPT</div>
            <div class="block-body">
              <ul>
                <li><strong>2022:</strong> ChatGPT (GPT-3.5) dirilis — 1 juta pengguna dalam 5 hari</li>
                <li><strong>2023:</strong> GPT-4 — multimodal (teks + gambar), lebih akurat</li>
                <li><strong>2024:</strong> GPT-4o — lebih cepat, mendukung suara &amp; video real-time</li>
                <li><strong>Model:</strong> Transformer-based + RLHF (Reinforcement Learning from Human Feedback)</li>
                <li><strong>Parameter:</strong> ~1,8 triliun (GPT-4, perkiraan)</li>
              </ul>
            </div>
          </div>
          <div class="block" style="border-color:rgba(99,102,241,0.4)">
            <div class="block-head" style="color:#8b8cf8">📜 Profil &amp; Sejarah DeepSeek</div>
            <div class="block-body">
              <ul>
                <li><strong>2023:</strong> DeepSeek-V1 &amp; Coder dirilis — fokus coding &amp; matematika</li>
                <li><strong>Jan 2025:</strong> DeepSeek-R1 — kemampuan <em>reasoning</em> setara GPT-4o</li>
                <li><strong>Keunggulan:</strong> Open-source, efisiensi biaya pelatihan sangat tinggi</li>
                <li><strong>Model:</strong> Mixture of Experts (MoE) — hanya aktivasi sebagian parameter</li>
                <li><strong>Parameter aktif:</strong> ~37B dari 671B total (MoE)</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- PERBANDINGAN TEKNIS -->
        <div class="block" style="animation-delay:0.35s">
          <div class="block-head">⚖️ Perbandingan Teknis ChatGPT vs DeepSeek</div>
          <div style="overflow-x:auto;margin-top:10px;">
            <table style="width:100%;border-collapse:collapse;font-size:13px;">
              <thead>
                <tr style="background:rgba(255,255,255,0.06);">
                  <th style="padding:8px 12px;text-align:left;color:var(--gp);font-weight:700;border-bottom:1px solid var(--brd);">Aspek</th>
                  <th style="padding:8px 12px;text-align:center;color:#10a37f;font-weight:700;border-bottom:1px solid var(--brd);">🤖 ChatGPT (GPT-4o)</th>
                  <th style="padding:8px 12px;text-align:center;color:#8b8cf8;font-weight:700;border-bottom:1px solid var(--brd);">🐋 DeepSeek-R1</th>
                </tr>
              </thead>
              <tbody>
                <tr style="border-bottom:1px solid rgba(255,255,255,0.05);">
                  <td style="padding:7px 12px;color:rgba(255,255,255,0.7);">Arsitektur</td>
                  <td style="padding:7px 12px;text-align:center;color:rgba(255,255,255,0.85);">Dense Transformer</td>
                  <td style="padding:7px 12px;text-align:center;color:rgba(255,255,255,0.85);">Mixture of Experts (MoE)</td>
                </tr>
                <tr style="border-bottom:1px solid rgba(255,255,255,0.05);background:rgba(255,255,255,0.02);">
                  <td style="padding:7px 12px;color:rgba(255,255,255,0.7);">Akses</td>
                  <td style="padding:7px 12px;text-align:center;color:rgba(255,255,255,0.85);">Closed-source (API berbayar)</td>
                  <td style="padding:7px 12px;text-align:center;color:rgba(255,255,255,0.85);">Open-source (MIT License)</td>
                </tr>
                <tr style="border-bottom:1px solid rgba(255,255,255,0.05);">
                  <td style="padding:7px 12px;color:rgba(255,255,255,0.7);">Biaya Pelatihan</td>
                  <td style="padding:7px 12px;text-align:center;color:rgba(255,255,255,0.85);">~$100 juta (GPT-4)</td>
                  <td style="padding:7px 12px;text-align:center;color:#8b8cf8;font-weight:700;">~$5,5 juta (R1) ⚡ 18× lebih hemat</td>
                </tr>
                <tr style="border-bottom:1px solid rgba(255,255,255,0.05);background:rgba(255,255,255,0.02);">
                  <td style="padding:7px 12px;color:rgba(255,255,255,0.7);">Kemampuan Reasoning</td>
                  <td style="padding:7px 12px;text-align:center;color:rgba(255,255,255,0.85);">GPT-4o (sangat baik)</td>
                  <td style="padding:7px 12px;text-align:center;color:rgba(255,255,255,0.85);">R1 setara / unggul di math &amp; coding</td>
                </tr>
                <tr style="border-bottom:1px solid rgba(255,255,255,0.05);">
                  <td style="padding:7px 12px;color:rgba(255,255,255,0.7);">Multimodal</td>
                  <td style="padding:7px 12px;text-align:center;color:#10a37f;font-weight:700;">✅ Teks, Gambar, Suara, Video</td>
                  <td style="padding:7px 12px;text-align:center;color:rgba(255,255,255,0.85);">⚠️ Teks &amp; kode (DeepSeek-VL untuk gambar)</td>
                </tr>
                <tr style="background:rgba(255,255,255,0.02);">
                  <td style="padding:7px 12px;color:rgba(255,255,255,0.7);">Pengguna Aktif</td>
                  <td style="padding:7px 12px;text-align:center;color:#10a37f;font-weight:700;">200 juta+ pengguna/minggu</td>
                  <td style="padding:7px 12px;text-align:center;color:rgba(255,255,255,0.85);">27 juta+ unduhan (Jan 2025)</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- DAMPAK & KONTROVERSI -->
        <div class="two-col" style="animation:fadeInUp 0.5s 0.5s both;">
          <div class="block" style="border-color:rgba(16,163,127,0.4)">
            <div class="block-head" style="color:#10a37f">🌍 Dampak ChatGPT di Dunia Nyata</div>
            <div class="block-body">
              <ul>
                <li>Dipakai di <strong>pendidikan</strong>: tutor pribadi, buat soal, rangkum materi</li>
                <li><strong>Dunia kerja</strong>: otomasi penulisan, coding, analisis data</li>
                <li><strong>Kesehatan</strong>: bantu diagnosis awal &amp; konsultasi medis dasar</li>
                <li>Jadi standar industri AI chatbot — memicu persaingan Google Gemini, Meta AI, dll.</li>
              </ul>
            </div>
          </div>
          <div class="block" style="border-color:rgba(99,102,241,0.4)">
            <div class="block-head" style="color:#8b8cf8">💥 Fenomena DeepSeek R1 (Januari 2025)</div>
            <div class="block-body">
              <ul>
                <li>Rilis R1 membuat saham <strong>Nvidia turun 17%</strong> ($590 miliar dalam sehari)</li>
                <li>Membuktikan model kelas dunia bisa dilatih dengan biaya <strong>jauh lebih efisien</strong></li>
                <li>Open-source penuh — komunitas bisa deploy secara mandiri (self-hosted)</li>
                <li>Mengubah persepsi bahwa AI canggih hanya bisa dibuat perusahaan AS besar</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="info-box warn" style="animation-delay:0.65s;font-size:14px">
          ⚡ <strong>Insight Kunci:</strong> ChatGPT unggul dalam ekosistem &amp; multimodal; DeepSeek unggul dalam efisiensi biaya &amp; keterbukaan kode. Keduanya mendorong perkembangan AI Chatbot Generatif yang semakin demokratis dan terjangkau.
        </div>
      </div>

      <!-- ======================== SLIDE 6 ======================== -->
      <div class="slide" id="s6">
        <div class="slide-tag"><span class="tag-num">06</span>Kesimpulan</div>
        <h2 class="slide-title">Kesimpulan <span>&amp; Penutup</span></h2>
        <p class="slide-sub">Manfaat, keterbatasan, &amp; arah masa depan chatbot — Adamopoulou &amp; Moussiades (2020)</p>

        <div class="three-col">
          <div class="block" style="animation-delay:0.2s">
            <div class="block-icon">📈</div>
            <div class="block-head">Perkembangan Pesat</div>
            <div class="block-body">Chatbot berkembang pesat sejak 2016. Dari ELIZA yang hanya punya 200 kata kunci hingga sistem berbasis ML yang mampu memahami konteks percakapan kompleks dan merespons secara emosional.</div>
          </div>
          <div class="block" style="animation-delay:0.3s">
            <div class="block-icon">🌐</div>
            <div class="block-head">Dampak Luas</div>
            <div class="block-body">Chatbot telah mentransformasi layanan pelanggan (24/7), pendidikan (bantu ribuan mahasiswa), kesehatan (diagnosis, terapi), perbankan, kuliner &amp; transportasi. Tidak terbatas pada satu industri saja.</div>
          </div>
          <div class="block" style="animation-delay:0.4s">
            <div class="block-icon">🔬</div>
            <div class="block-head">Arah Masa Depan</div>
            <div class="block-body">Kemajuan NLP (semantik, konteks, pengetahuan) akan menjadi kunci. Chatbot masa depan perlu belajar <em>berpikir</em>, tidak hanya berbicara — integrasi antara bahasa &amp; kognisi jadi tantangan utama.</div>
          </div>
        </div>

        <div class="two-col" style="animation:fadeInUp 0.5s 0.5s both;">
          <div class="block" style="border-color:rgba(201,168,76,0.3)">
            <div class="block-head" style="color:var(--gold)">⚠️ Keterbatasan Utama Chatbot</div>
            <div class="block-body">
              <ul>
                <li>❌ <strong>Gagal memahami intent</strong> — frustrasi bagi pengguna</li>
                <li>❌ <strong>Konten toxic</strong> — rentan disalahgunakan (kasus Tay)</li>
                <li>❌ <strong>Keamanan data</strong> — privasi &amp; autentikasi lemah (Alexa)</li>
                <li>❌ <strong>Kurang empati</strong> — sulit menggantikan dokter/psikolog</li>
                <li>❌ <strong>Kesalahan ejaan/logat</strong> menyebabkan intent salah terdeteksi</li>
              </ul>
            </div>
          </div>
          <div class="block" style="border-color:rgba(76,175,125,0.4)">
            <div class="block-head">✅ Strategi Mitigasi Risiko</div>
            <div class="block-body">
              <ul>
                <li>✅ Integrasikan <strong>Live Chat</strong> untuk input yang tidak dikenali</li>
                <li>✅ Gunakan <strong>Spell Checker</strong> sebagai preprocessing</li>
                <li>✅ Terapkan <strong>Human-in-the-Loop (HITL)</strong></li>
                <li>✅ Buat wording yang disetujui untuk menghindari pesan ofensif</li>
                <li>✅ Built-in <strong>Quality Assurance Tools</strong> untuk peningkatan berkelanjutan</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="info-box accent" style="animation-delay:0.6s">
          🌿 "Chatbot hari ini sudah bisa berbagi pikiran, berdebat, bahkan menipu seperti manusia — namun tantangan terbesar adalah mengajarkan mereka untuk <em>berpikir</em>, bukan hanya berbicara." — Adamopoulou &amp; Moussiades (2020)
        </div>

        <div class="info-box success" style="animation-delay:0.7s;font-size:16px">
          🎓 <strong>Terima Kasih!</strong> Presentasi ini disusun berdasarkan <em>Chatbots: History, Technology, and Applications</em> oleh Adamopoulou &amp; Moussiades, Machine Learning with Applications, Elsevier (2020) · Mata Kuliah <em>Artificial Intelligence</em> · Dosen: Lucky Lhaura Van FC 🌿
        </div>
      </div>

    </div><!-- end viewport -->

    <div class="bottombar" id="dots"></div>
  </div>

  <!-- ===== CHATBOT PANEL ===== -->
  <div class="chat-panel" id="chatPanel">
    <div class="cp-header">
      <div class="cp-avatar">🤖</div>
      <div class="cp-info">
        <div class="cp-name">GPT Assistant</div>
        <div class="cp-status"><div class="status-dot"></div>Online · GPT via OpenRouter</div>
      </div>
      <button type="button" id="closeChatBtn" title="Tutup panel" style="
        margin-left:auto; background:rgba(255,255,255,0.07);
        border:1px solid var(--brd); border-radius:8px;
        color:rgba(255,255,255,0.5); cursor:pointer;
        width:28px; height:28px; font-size:14px;
        display:flex; align-items:center; justify-content:center;
        flex-shrink:0; transition:all 0.2s;
      " onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.12)'"
         onmouseout="this.style.color='rgba(255,255,255,0.5)';this.style.background='rgba(255,255,255,0.07)'">✕</button>
    </div>

    <div class="cp-messages" id="msgs">
      <div class="msg bot">
        <div class="msg-bubble">Halo! 👋 Saya <strong>GPT Assistant</strong> siap membantu Anda memahami materi presentasi tentang <strong>AI Chatbot & GPT</strong>.<br><br>Tanyakan apa saja seputar cara kerja GPT, tokenization, transformer, atau studi kasus ChatGPT! 🌿</div>
        <div class="msg-time">Sekarang</div>
      </div>
    </div>

    <div class="cp-quick" id="quickArea"></div>

    <div class="cp-input-area">
      <textarea class="cp-textarea" id="chatInput" placeholder="Tanya seputar AI & GPT…" rows="1"></textarea>
      <button type="button" class="cp-send" id="sendBtn" title="Kirim">➤</button>
    </div>
  </div>

  <!-- Toggle button (always visible on the right edge) -->
  <button type="button" class="chat-toggle-btn open" id="chatToggleBtn" title="Buka / Tutup AI Chat">‹</button>

</div><!-- end app -->

<script>
/* ==============================================================
   SEMUA KODE DIBUNGKUS window.onload
   agar DOM pasti siap sebelum JS dieksekusi (fix XAMPP)
   ============================================================== */
window.onload = function() {

  /* ---- SLIDE NAVIGATION ---- */
  var SLIDES = [
    'Pengertian & Pengantar',
    'Evolusi Chatbot',
    'Arsitektur Sistem',
    'Cara Alur Kerja Chatbot',
    'Studi Kasus Aplikasi',
    'Kesimpulan'
  ];

  /* Expose globally so inline onclick="goSlide(...)" works */
  window.current = 0;
  window.goSlide = function(idx) {
    if (idx < 0 || idx >= SLIDES.length) return;
    document.getElementById('s' + (window.current+1)).classList.remove('active');
    document.getElementById('ni'  + window.current).classList.remove('active');
    document.getElementById('dot' + window.current).classList.remove('active');
    window.current = idx;
    document.getElementById('s' + (window.current+1)).classList.add('active');
    document.getElementById('ni'  + window.current).classList.add('active');
    document.getElementById('dot' + window.current).classList.add('active');
    document.getElementById('slideCounter').textContent = (window.current+1) + ' / ' + SLIDES.length;
    document.getElementById('btnPrev').disabled = (window.current === 0);
    document.getElementById('btnNext').disabled = (window.current === SLIDES.length - 1);
    updateQuick();
  };

  /* Build nav items */
  var navEl = document.getElementById('nav');
  SLIDES.forEach(function(label, i) {
    var el = document.createElement('div');
    el.className = 'nav-item' + (i === 0 ? ' active' : '');
    el.id = 'ni' + i;
    el.onclick = (function(idx){ return function(){ goSlide(idx); }; })(i);
    el.innerHTML = '<div class="nav-num">SLIDE ' + (i < 9 ? '0' : '') + (i+1) + '</div>'
                 + '<div class="nav-label">' + label + '</div>';
    navEl.appendChild(el);
  });

  /* Build dot nav */
  var dotsEl = document.getElementById('dots');
  SLIDES.forEach(function(_, i) {
    var d = document.createElement('div');
    d.className = 'dot-nav' + (i === 0 ? ' active' : '');
    d.id = 'dot' + i;
    d.onclick = (function(idx){ return function(){ goSlide(idx); }; })(i);
    dotsEl.appendChild(d);
  });

  document.addEventListener('keydown', function(e) {
    if (e.target.tagName === 'TEXTAREA') return;
    if (e.key === 'ArrowRight' || e.key === 'ArrowDown') goSlide(window.current + 1);
    if (e.key === 'ArrowLeft'  || e.key === 'ArrowUp')   goSlide(window.current - 1);
  });

  /* ---- QUICK BUTTONS PER SLIDE ---- */
  /* HARUS didefinisikan SEBELUM goSlide(0) agar updateQuick() tidak crash */
  var quickSets = [
    ['Apa itu chatbot?',           'Bedanya bot vs chatbot?',       'Apa itu NLP dalam chatbot?'],
    ['Kapan ELIZA diciptakan?',    'Apa itu AIML?',                 'Apa bedanya rule-based vs ML?'],
    ['Jelaskan Dialog Manager',    'Apa itu Sentiment Analysis?',   'Apa fungsi Intent Classification?'],
    ['Apa itu NLU?',               'Jelaskan NLG dalam chatbot',    'Bagaimana entity extraction bekerja?'],
    ['Apa bedanya ChatGPT vs DeepSeek?','Bagaimana DeepSeek bisa lebih murah?','Apa itu Mixture of Experts?'],
    ['Apa keterbatasan chatbot?',  'Apa itu Human-in-the-Loop?',   'Masa depan chatbot?']
  ];

  function updateQuick() {
    var qa = document.getElementById('quickArea');
    if (!qa || !quickSets) return;
    qa.innerHTML = '';
    quickSets[window.current].forEach(function(q) {
      var b = document.createElement('button');
      b.type = 'button';
      b.className  = 'quick-btn';
      b.textContent = q;
      b.onclick = (function(tanya){ return function(){ quickAsk(tanya); }; })(q);
      qa.appendChild(b);
    });
  }

  goSlide(0);

  /* ---- CHATBOT ---- */
  /*
   * GANTI API KEY DI SINI jika diperlukan.
   * Daftar gratis di https://openrouter.ai/ → Dashboard → API Keys
   */
  var API_KEY = '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';
  var API_URL = 'https://openrouter.ai/api/v1/chat/completions';
  var MODEL   = 'openai/gpt-4o-mini';

  var chatHistory = [
    {
      role: 'system',
      content: 'Anda adalah GPT Assistant yang ahli dalam: AI Chatbot, NLP, cara kerja GPT (Tokenization, Embedding, Transformer, Self-Attention, Decoding), Arsitektur Chatbot (NLU, Dialogue Manager, NLG), dan Studi Kasus ChatGPT oleh OpenAI (GPT-1 hingga GPT-4o, RLHF). Jawab dalam bahasa Indonesia yang jelas, ramah, dan informatif. Gunakan emoji secukupnya. Berikan contoh nyata bila relevan.'
    }
  ];

  var msgsEl   = document.getElementById('msgs');
  var inputEl  = document.getElementById('chatInput');
  var btnEl    = document.getElementById('sendBtn');
  var sedang   = false; /* flag mencegah double-send */

  function jamSekarang() {
    var d = new Date();
    var h = String(d.getHours()).padStart(2,'0');
    var m = String(d.getMinutes()).padStart(2,'0');
    return h + ':' + m;
  }

  function tambahPesan(role, html) {
    var wrap   = document.createElement('div');
    wrap.className = 'msg ' + role;

    var bubble = document.createElement('div');
    bubble.className = 'msg-bubble';
    bubble.innerHTML = html;

    var waktu  = document.createElement('div');
    waktu.className = 'msg-time';
    waktu.textContent = jamSekarang();

    wrap.appendChild(bubble);
    wrap.appendChild(waktu);
    msgsEl.appendChild(wrap);
    msgsEl.scrollTop = msgsEl.scrollHeight;
    return wrap;
  }

  function tampilTyping() {
    var wrap = document.createElement('div');
    wrap.className = 'msg bot';
    wrap.id = 'typing-wrap';
    wrap.innerHTML = '<div class="msg-bubble" style="display:flex;gap:5px;align-items:center;padding:10px 14px">'
      + '<div class="typing-dot"></div>'
      + '<div class="typing-dot"></div>'
      + '<div class="typing-dot"></div>'
      + '</div>';
    msgsEl.appendChild(wrap);
    msgsEl.scrollTop = msgsEl.scrollHeight;
  }

  function hapusTyping() {
    var t = document.getElementById('typing-wrap');
    if (t && t.parentNode) t.parentNode.removeChild(t);
  }

  function formatReply(teks) {
    return teks
      .replace(/&/g,  '&amp;')
      .replace(/</g,  '&lt;')
      .replace(/>/g,  '&gt;')
      .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
      .replace(/\*(.*?)\*/g,     '<em>$1</em>')
      .replace(/\n/g, '<br>');
  }

  /* ---- FUNGSI KIRIM ---- */
  function kirim() {
    if (sedang) return;

    var teks = inputEl.value.trim();
    if (!teks) return;

    /* Lock */
    sedang = true;
    btnEl.disabled = true;

    /* Kosongkan input */
    inputEl.value = '';
    inputEl.style.height = 'auto';

    /* Tampilkan pesan user di chat */
    var safeText = teks
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/\n/g, '<br>');
    tambahPesan('user', safeText);

    /* Simpan ke history & tampilkan animasi */
    chatHistory.push({ role: 'user', content: teks });
    tampilTyping();

    /* Panggil API OpenRouter */
    fetch(API_URL, {
      method: 'POST',
      headers: {
        'Content-Type':  'application/json',
        'Authorization': 'Bearer ' + API_KEY,
        'HTTP-Referer':  'http://localhost',
        'X-Title':       'AI Chatbot Presentation'
      },
      body: JSON.stringify({
        model:       MODEL,
        messages:    chatHistory,
        max_tokens:  700,
        temperature: 0.7
      })
    })
    .then(function(res) {
      return res.json();
    })
    .then(function(data) {
      hapusTyping();
      var balasan = '';
      if (data.choices && data.choices[0] && data.choices[0].message && data.choices[0].message.content) {
        balasan = data.choices[0].message.content;
        chatHistory.push({ role: 'assistant', content: balasan });
      } else if (data.error) {
        balasan = '⚠️ Error API: ' + (data.error.message || JSON.stringify(data.error))
                + '\n\nCek API key di openrouter.ai (mungkin sudah kadaluarsa atau kuota habis).';
      } else {
        balasan = '⚠️ Respons tidak dikenali dari server.';
      }
      tambahPesan('bot', formatReply(balasan));
    })
    .catch(function(err) {
      hapusTyping();
      tambahPesan('bot',
        '⚠️ <strong>Koneksi gagal.</strong><br>'
        + 'Pastikan:<br>'
        + '• XAMPP Apache berjalan ✅<br>'
        + '• Koneksi internet aktif ✅<br>'
        + '• API key valid di openrouter.ai ✅<br>'
        + '<small style="opacity:0.6">Detail: ' + err.message + '</small>'
      );
      console.error('[ChatGPT Error]', err);
    })
    .finally(function() {
      sedang = false;
      btnEl.disabled = false;
      inputEl.focus();
    });
  }

  /* ---- EVENT HANDLER ---- */
  btnEl.addEventListener('click', function() {
    kirim();
  });

  inputEl.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      e.stopPropagation();
      kirim();
    }
  });

  inputEl.addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = Math.min(this.scrollHeight, 80) + 'px';
  });

  function quickAsk(q) {
    inputEl.value = q;
    kirim();
  }

  updateQuick();

  /* ---- CHAT PANEL TOGGLE ---- */
  var chatPanel     = document.getElementById('chatPanel');
  var chatToggleBtn = document.getElementById('chatToggleBtn');
  var closeChatBtn  = document.getElementById('closeChatBtn');
  var panelOpen     = true;

  function setChatPanel(open) {
    panelOpen = open;
    if (open) {
      chatPanel.classList.remove('collapsed');
      chatToggleBtn.classList.add('open');
      chatToggleBtn.textContent = '›';
      chatToggleBtn.title = 'Tutup AI Chat';
      chatToggleBtn.style.right = '300px';
    } else {
      chatPanel.classList.add('collapsed');
      chatToggleBtn.classList.remove('open');
      chatToggleBtn.textContent = '‹';
      chatToggleBtn.title = 'Buka AI Chat';
      chatToggleBtn.style.right = '0';
    }
  }

  chatToggleBtn.onclick = function() { setChatPanel(!panelOpen); };
  closeChatBtn.onclick  = function() { setChatPanel(false); };

}; /* akhir window.onload */
</script>
</body>
</html>