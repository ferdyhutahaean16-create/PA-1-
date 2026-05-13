@extends('layouts.main')

@section('title', 'Laboratorium Terpadu')

@section('content')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{
  --ink:#0d1f16;
  --ink2:#2a4a38;
  --sage:#4a7c62;
  --sage-light:#7aab90;
  --mist:#f0f5f2;
  --mist2:#e4ede8;
  --leaf:#1a4a38;
  --leaf2:#2d6b52;
  --gold:#b8975a;
  --gold2:#d4ae72;
  --cream:#faf8f4;
  --white:#ffffff;
  --border:#d8e4dd;
}
body{font-family:'Inter',sans-serif;background:var(--cream);color:var(--ink)}

.hero{
  position:relative;
  min-height:92vh;
  display:flex;
  flex-direction:column;
  justify-content:flex-end;
  background:#0b1a12;
  overflow:hidden;
  padding:0 0 80px;
}
.hero-canvas{position:absolute;inset:0;overflow:hidden}
.hero-lines{
  position:absolute;inset:0;
  background-image:
    repeating-linear-gradient(0deg,transparent,transparent 79px,rgba(74,124,98,0.06) 80px),
    repeating-linear-gradient(90deg,transparent,transparent 79px,rgba(74,124,98,0.06) 80px);
}
.hero-glow-1{
  position:absolute;width:700px;height:700px;border-radius:50%;
  background:radial-gradient(circle,rgba(26,74,56,0.55) 0%,transparent 70%);
  top:-200px;right:-100px;
}
.hero-glow-2{
  position:absolute;width:500px;height:500px;border-radius:50%;
  background:radial-gradient(circle,rgba(184,151,90,0.12) 0%,transparent 70%);
  bottom:-100px;left:10%;
}
.hero-circle-ring{
  position:absolute;right:8%;top:50%;transform:translateY(-50%);
  width:420px;height:420px;border-radius:50%;
  border:1px solid rgba(74,124,98,0.15);
  display:flex;align-items:center;justify-content:center;
}
.hero-circle-ring::before{
  content:'';display:block;width:320px;height:320px;border-radius:50%;
  border:1px solid rgba(74,124,98,0.1);
}
.hero-molecule{position:absolute;right:8%;top:50%;transform:translateY(-50%);opacity:0.18}
.hero-body{
  position:relative;z-index:10;
  max-width:1100px;margin:0 auto;padding:0 60px;width:100%;
}
.hero-overline{
  font-family:'JetBrains Mono',monospace;font-size:11px;letter-spacing:0.2em;
  color:var(--sage-light);text-transform:uppercase;margin-bottom:28px;
  display:flex;align-items:center;gap:16px;
}
.hero-overline::before{content:'';display:block;width:40px;height:1px;background:var(--sage-light);opacity:0.6}
.hero-h1{
  font-family:'Cormorant Garamond',serif;
  font-size:clamp(3.5rem,7vw,6rem);font-weight:600;
  color:#ffffff;line-height:1.0;letter-spacing:-0.02em;margin-bottom:8px;
}
.hero-h1 em{font-style:italic;color:var(--gold2)}
.hero-sub{
  font-size:1rem;color:rgba(255,255,255,0.42);font-weight:300;
  letter-spacing:0.02em;max-width:400px;line-height:1.7;margin-bottom:52px;margin-top:20px;
}
.scroll-cue{position:absolute;bottom:32px;left:50%;transform:translateX(-50%);z-index:10;display:flex;flex-direction:column;align-items:center;gap:8px}
.scroll-cue-line{width:1px;height:48px;background:linear-gradient(to bottom,rgba(74,124,98,0.6),transparent);animation:scrollline 2s ease-in-out infinite}
@keyframes scrollline{0%{transform:scaleY(0);transform-origin:top}50%{transform:scaleY(1);transform-origin:top}51%{transform:scaleY(1);transform-origin:bottom}100%{transform:scaleY(0);transform-origin:bottom}}

.section{max-width:1100px;margin:0 auto;padding:100px 60px}
.section-header{display:grid;grid-template-columns:auto 1fr;align-items:start;gap:32px;margin-bottom:64px}
.section-num{font-family:'Cormorant Garamond',serif;font-size:5rem;font-weight:700;color:var(--mist2);line-height:1;letter-spacing:-0.04em;user-select:none}
.section-tag{font-family:'JetBrains Mono',monospace;font-size:10px;letter-spacing:0.18em;color:var(--sage);text-transform:uppercase;margin-bottom:10px;display:flex;align-items:center;gap:10px}
.section-tag::before{content:'';display:block;width:24px;height:1px;background:var(--sage)}
.section-h2{font-family:'Cormorant Garamond',serif;font-size:clamp(2rem,3.5vw,2.8rem);font-weight:600;color:var(--ink);line-height:1.1;letter-spacing:-0.02em}

.lab-list{display:flex;flex-direction:column;gap:2px}
.lab-item{background:var(--white);border:1px solid var(--border);border-radius:0;overflow:hidden;transition:border-color .25s}
.lab-item:first-child{border-radius:16px 16px 0 0}
.lab-item:last-child{border-radius:0 0 16px 16px}
.lab-item:only-child{border-radius:16px}
.lab-item[data-active="true"]{border-color:rgba(26,74,56,0.25);z-index:1;position:relative}
.lab-trigger{width:100%;padding:28px 32px;display:flex;align-items:center;gap:24px;background:transparent;border:none;cursor:pointer;text-align:left;transition:background .2s}
.lab-trigger:hover{background:#fafcfb}
.lab-idx{font-family:'Cormorant Garamond',serif;font-size:2rem;font-weight:700;color:var(--mist2);width:48px;flex-shrink:0;line-height:1;transition:color .3s}
.lab-item[data-active="true"] .lab-idx{color:var(--leaf)}
.lab-meta{flex:1;min-width:0}
.lab-name-text{font-family:'Cormorant Garamond',serif;font-size:1.35rem;font-weight:600;color:var(--ink);margin-bottom:3px;letter-spacing:-0.01em}
.lab-head-text{font-size:12px;color:var(--sage);font-weight:400}
.lab-status-pill{display:inline-flex;align-items:center;gap:6px;background:var(--mist);border:1px solid var(--mist2);border-radius:100px;padding:5px 12px;font-size:11px;font-weight:500;color:var(--sage);flex-shrink:0}
.lab-status-dot{width:6px;height:6px;border-radius:50%;background:var(--sage)}
.lab-arrow{width:36px;height:36px;border-radius:50%;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:background .25s,border-color .25s,transform .35s}
.lab-item[data-active="true"] .lab-arrow{background:var(--leaf);border-color:var(--leaf);transform:rotate(180deg)}
.lab-item[data-active="true"] .lab-arrow svg{stroke:#fff}
.lab-body{padding:0 32px 40px;border-top:1px solid var(--mist2)}
.lab-body-inner{display:grid;grid-template-columns:1fr 340px;gap:48px;padding-top:32px}
.lab-desc{font-size:.9rem;color:#4a6a58;line-height:1.85;text-align:justify;margin-bottom:28px}
.lab-facts{display:flex;flex-direction:column;gap:1px;border:1px solid var(--border);border-radius:12px;overflow:hidden}
.lab-fact-row{display:flex;background:var(--white)}
.lab-fact-label{width:140px;flex-shrink:0;background:var(--mist);padding:14px 16px;font-size:11px;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--sage);border-right:1px solid var(--border);display:flex;align-items:center}
.lab-fact-val{flex:1;padding:14px 16px;font-size:.88rem;color:var(--ink2);display:flex;align-items:center}
.lab-photos{display:grid;grid-template-columns:1fr 1fr;gap:8px}
.lab-photo{width:100%;aspect-ratio:4/3;object-fit:cover;border-radius:10px;border:1px solid var(--border);transition:transform .3s}
.lab-photo:hover{transform:scale(1.03)}
.lab-photo-ph{width:100%;aspect-ratio:4/3;background:var(--mist);border-radius:10px;border:1px dashed var(--mist2);display:flex;align-items:center;justify-content:center;color:var(--mist2)}

.services-section{background:var(--white);border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
.services-inner{max-width:1100px;margin:0 auto;padding:0 60px}
.svc-header{padding:80px 0 0;display:grid;grid-template-columns:auto 1fr;align-items:start;gap:32px;margin-bottom:0;border-bottom:1px solid var(--border)}
.services-grid{display:grid;grid-template-columns:1fr 1fr;gap:0}
.svc-card{padding:60px 52px;position:relative;overflow:hidden;transition:background .3s}
.svc-card:first-child{border-right:1px solid var(--border)}
.svc-card:hover{background:var(--mist)}
.svc-tag-line{display:flex;align-items:center;gap:12px;margin-bottom:32px}
.svc-tag-num{font-family:'JetBrains Mono',monospace;font-size:11px;color:var(--sage);letter-spacing:0.1em}
.svc-tag-bar{flex:1;height:1px;background:var(--border)}
.svc-icon{width:56px;height:56px;border-radius:14px;display:flex;align-items:center;justify-content:center;margin-bottom:28px}
.svc-icon.a{background:#eaf3ef;border:1px solid #c8dfd5}
.svc-icon.b{background:#f3eaf3;border:1px solid #dfc8df}
.svc-h{font-family:'Cormorant Garamond',serif;font-size:1.8rem;font-weight:600;color:var(--ink);margin-bottom:12px;letter-spacing:-0.02em;line-height:1.1}
.svc-p{font-size:.88rem;color:#6a8a78;line-height:1.7;margin-bottom:36px;max-width:340px}
.svc-btn{display:inline-flex;align-items:center;gap:10px;background:var(--leaf);color:#fff;font-size:.83rem;font-weight:600;letter-spacing:0.05em;text-transform:uppercase;padding:14px 28px;border-radius:100px;text-decoration:none;transition:background .25s,transform .25s,box-shadow .25s}
.svc-btn:hover{background:var(--leaf2);transform:translateY(-3px);box-shadow:0 16px 32px rgba(26,74,56,0.2)}
.svc-btn svg{transition:transform .25s}
.svc-btn:hover svg{transform:translateX(3px)}
.svc-corner-deco{position:absolute;bottom:-40px;right:-40px;width:160px;height:160px;border-radius:50%;border:1px solid var(--border);opacity:0.5;pointer-events:none}
.svc-corner-deco::before{content:'';position:absolute;inset:24px;border-radius:50%;border:1px solid var(--border)}

.status-section{max-width:1100px;margin:0 auto;padding:80px 60px}
.status-card{background:var(--ink);border-radius:24px;padding:60px 64px;display:flex;align-items:center;justify-content:space-between;gap:40px;position:relative;overflow:hidden}
.status-card::before{content:'';position:absolute;top:-120px;right:-120px;width:400px;height:400px;border-radius:50%;background:radial-gradient(circle,rgba(26,74,56,0.7) 0%,transparent 70%);pointer-events:none}
.status-card::after{content:'';position:absolute;bottom:-80px;left:30%;width:280px;height:280px;border-radius:50%;background:radial-gradient(circle,rgba(184,151,90,0.08) 0%,transparent 70%);pointer-events:none}
.status-left{position:relative;z-index:1}
.status-eyebrow{font-family:'JetBrains Mono',monospace;font-size:10px;letter-spacing:0.2em;color:var(--sage-light);text-transform:uppercase;margin-bottom:14px;display:flex;align-items:center;gap:10px}
.status-eyebrow::before{content:'';display:block;width:20px;height:1px;background:var(--sage-light)}
.status-h{font-family:'Cormorant Garamond',serif;font-size:2.2rem;font-weight:600;color:#fff;letter-spacing:-0.02em;margin-bottom:10px}
.status-p{font-size:.88rem;color:rgba(255,255,255,0.4);max-width:360px;line-height:1.65}
.status-btn{position:relative;z-index:1;flex-shrink:0;display:inline-flex;align-items:center;gap:12px;background:#fff;color:var(--leaf);font-size:.85rem;font-weight:700;letter-spacing:0.06em;text-transform:uppercase;padding:16px 32px;border-radius:100px;text-decoration:none;transition:transform .25s,box-shadow .25s;white-space:nowrap}
.status-btn:hover{transform:translateY(-3px);box-shadow:0 20px 40px rgba(0,0,0,0.35)}

.empty-lab{padding:80px 32px;text-align:center;border:1px dashed var(--border);border-radius:16px;color:var(--sage-light)}

@media(max-width:900px){
  .hero-body,.section,.status-section{padding-left:28px;padding-right:28px}
  .services-inner{padding-left:28px;padding-right:28px}
  .section-header,.svc-header{grid-template-columns:1fr}
  .section-num{display:none}
  .hero-h1{font-size:3rem}
  .lab-body-inner{grid-template-columns:1fr}
  .services-grid{grid-template-columns:1fr}
  .svc-card:first-child{border-right:none;border-bottom:1px solid var(--border)}
  .status-card{flex-direction:column;text-align:center;padding:40px 32px}
  .status-eyebrow{justify-content:center}
  .status-p{max-width:100%}
  .hero-circle-ring{display:none}
}
</style>

{{-- HERO --}}
<div class="hero">
  <div class="hero-canvas">
    <div class="hero-lines"></div>
    <div class="hero-glow-1"></div>
    <div class="hero-glow-2"></div>
    <div class="hero-circle-ring"></div>
    <svg class="hero-molecule" width="280" height="280" viewBox="0 0 280 280" fill="none">
      <circle cx="140" cy="140" r="10" fill="#4a7c62"/>
      <circle cx="80"  cy="80"  r="7"  fill="#4a7c62"/>
      <circle cx="200" cy="80"  r="7"  fill="#4a7c62"/>
      <circle cx="80"  cy="200" r="7"  fill="#4a7c62"/>
      <circle cx="200" cy="200" r="7"  fill="#4a7c62"/>
      <circle cx="140" cy="40"  r="5"  fill="#b8975a"/>
      <circle cx="140" cy="240" r="5"  fill="#b8975a"/>
      <circle cx="40"  cy="140" r="5"  fill="#b8975a"/>
      <circle cx="240" cy="140" r="5"  fill="#b8975a"/>
      <line x1="140" y1="140" x2="80"  y2="80"  stroke="#4a7c62" stroke-width="1.5"/>
      <line x1="140" y1="140" x2="200" y2="80"  stroke="#4a7c62" stroke-width="1.5"/>
      <line x1="140" y1="140" x2="80"  y2="200" stroke="#4a7c62" stroke-width="1.5"/>
      <line x1="140" y1="140" x2="200" y2="200" stroke="#4a7c62" stroke-width="1.5"/>
      <line x1="80"  y1="80"  x2="140" y2="40"  stroke="#b8975a" stroke-width="1" opacity=".6"/>
      <line x1="200" y1="80"  x2="240" y2="140" stroke="#b8975a" stroke-width="1" opacity=".6"/>
      <line x1="80"  y1="200" x2="40"  y2="140" stroke="#b8975a" stroke-width="1" opacity=".6"/>
      <line x1="200" y1="200" x2="140" y2="240" stroke="#b8975a" stroke-width="1" opacity=".6"/>
      <circle cx="140" cy="140" r="70"  stroke="#4a7c62" stroke-width=".5" fill="none" opacity=".2"/>
      <circle cx="140" cy="140" r="120" stroke="#4a7c62" stroke-width=".5" fill="none" opacity=".1"/>
    </svg>
  </div>

  <div class="hero-body">
    <div class="hero-overline">Laboratorium Terpadu · Bioteknologi</div>
    <h1 class="hero-h1">Ruang Riset<br><em>Kelas Dunia</em></h1>
    <p class="hero-sub">Fasilitas laboratorium mutakhir untuk sivitas akademika Program Studi Bioteknologi — dari penelitian dasar hingga aplikasi terapan.</p>
  </div>
  <div class="scroll-cue"><div class="scroll-cue-line"></div></div>
</div>

{{-- DAFTAR LABORATORIUM --}}
<div class="section">
  <div class="section-header">
    <div class="section-num">01</div>
    <div>
      <div class="section-tag">Fasilitas Riset</div>
      <h2 class="section-h2">Daftar Laboratorium</h2>
    </div>
  </div>

  @if(isset($labs) && $labs->isEmpty())
    <div class="empty-lab">
      <svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin:0 auto 16px;display:block;opacity:.4">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
      </svg>
      <p style="font-weight:500;color:var(--sage);margin-bottom:4px">Belum ada data</p>
      <p style="font-size:.85rem;opacity:.7">Admin belum menambahkan laboratorium.</p>
    </div>
  @elseif(isset($labs))
    <div class="lab-list">
      @foreach($labs as $i => $lab)
      <div x-data="{ open: {{ $i === 0 ? 'true' : 'false' }} }" :data-active="open" class="lab-item">
        <button @click="open = !open" class="lab-trigger">
          <div class="lab-idx">{{ str_pad($i+1,2,'0',STR_PAD_LEFT) }}</div>
          <div class="lab-meta">
            <div class="lab-name-text">{{ $lab->nama_lab }}</div>
            @if($lab->kepala_lab)
              <div class="lab-head-text">Kepala: {{ $lab->kepala_lab }}</div>
            @endif
          </div>
          <div class="lab-status-pill">
            <span class="lab-status-dot"></span>
            Aktif
          </div>
          <div class="lab-arrow">
            <svg width="14" height="14" fill="none" stroke="#7aab90" viewBox="0 0 24 24" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
          </div>
        </button>
        <div x-show="open" x-collapse class="lab-body">
          <div class="lab-body-inner">
            <div>
              <p class="lab-desc">{{ $lab->deskripsi ?? 'Informasi deskripsi belum tersedia.' }}</p>
              <div class="lab-facts">
                <div class="lab-fact-row">
                  <div class="lab-fact-label">Kepala Lab</div>
                  <div class="lab-fact-val">{{ $lab->kepala_lab ?? '—' }}</div>
                </div>
                <div class="lab-fact-row" style="border-top:1px solid var(--border)">
                  <div class="lab-fact-label">Fasilitas</div>
                  <div class="lab-fact-val">{{ $lab->fasilitas ?? '—' }}</div>
                </div>
              </div>
            </div>
            <div class="lab-photos">
              @foreach(['foto','foto_2','foto_3','foto_4'] as $f)
                @if($lab->$f)
                  <img src="{{ asset($lab->$f) }}" class="lab-photo" alt="Foto {{ $lab->nama_lab }}">
                @else
                  <div class="lab-photo-ph">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                  </div>
                @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  @endif
@endsection