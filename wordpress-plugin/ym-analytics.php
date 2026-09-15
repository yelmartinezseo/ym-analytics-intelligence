<?php
/**
 * Plugin Name: YM Analytics Intelligence
 * Description: Dashboard SEO y marketing digital con datos de GA4. Shortcode: [ym_analytics]
 * Version: 2.2.8
 * Author: Yel Martínez
 * Author URI: https://yelmartinez.com
 * License: GPLv2 or later
 */

if (!defined('ABSPATH')) exit;

add_shortcode('ym_analytics', 'ym_analytics_render');

function ym_analytics_render() {
    // Usamos NOWDOC para evitar escapes de comillas
    $html = <<<'HTML'
<!-- YM Analytics Intelligence v2.2.0 WP Plugin | yelmartinez.com -->
<div id="ym-analytics-root" class="ym-r">

<style>
/* Prefijo ym- en todo para no colisionar con temas WP */
#ym-analytics-root{font-family:'Inter',system-ui,sans-serif;font-size:13px;line-height:1.6;color:#e8eaf6;background:#08090d;border-radius:16px;overflow:hidden;position:relative;min-height:780px;width:100%;container-type:inline-size;container-name:ymapp}
#ym-analytics-root *,#ym-analytics-root *::before,#ym-analytics-root *::after{box-sizing:border-box!important}
:where(#ym-analytics-root) *,:where(#ym-analytics-root) *::before,:where(#ym-analytics-root) *::after{margin:0;padding:0}
/* Variables */
.ym-r{--ym-ink:#08090d;--ym-ink2:#0d0f18;--ym-surface:#111320;--ym-raised:#181c2e;--ym-lifted:#1e2338;--ym-rim:rgba(255,255,255,0.07);--ym-rim2:rgba(255,255,255,0.04);--ym-lime:#b5f23d;--ym-lime-d:rgba(181,242,61,0.12);--ym-lime-g:rgba(181,242,61,0.25);--ym-violet:#8b5cf6;--ym-violet-text:#9a72f7;--ym-violet-btn:#7c4de8;--ym-violet-d:rgba(139,92,246,0.14);--ym-coral:#ff6b6b;--ym-sky:#38bdf8;--ym-amber:#fbbf24;--ym-text:#e8eaf6;--ym-t2:#8892b0;--ym-t3:#7e8aaf}
/* SPLASH */
.ym-splash{position:absolute;inset:0;z-index:100;background:var(--ym-ink);display:flex;align-items:center;justify-content:center;border-radius:16px;overflow-y:auto}
.ym-splash-mesh{position:absolute;inset:0;border-radius:16px;background:radial-gradient(ellipse 60% 40% at 20% 30%,rgba(139,92,246,.18) 0%,transparent 60%),radial-gradient(ellipse 50% 50% at 80% 70%,rgba(181,242,61,.10) 0%,transparent 60%),radial-gradient(ellipse 40% 60% at 60% 10%,rgba(56,189,248,.08) 0%,transparent 60%)}
.ym-splash-inner{position:relative;z-index:1;display:flex;flex-direction:column;align-items:center;gap:18px;padding:40px 32px;width:100%;max-width:440px;text-align:center}
.ym-sig{font-size:10px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:var(--ym-t2)}
.ym-title{font-size:clamp(30px,5vw,50px);font-weight:800;line-height:1.05;letter-spacing:-2px;color:var(--ym-text)}
.ym-title span{color:var(--ym-lime)}
.ym-sub{font-size:14px;color:var(--ym-t2);max-width:340px;line-height:1.7}
.ym-sform{display:flex;flex-direction:column;gap:9px;width:100%}
.ym-flbl{font-size:9px;font-weight:800;letter-spacing:1.5px;text-transform:uppercase;color:var(--ym-t2);display:block;margin-bottom:3px;text-align:left}
.ym-fi{background:var(--ym-raised)!important;border:1px solid var(--ym-rim)!important;color:var(--ym-text)!important;border-radius:10px;padding:11px 15px!important;font-size:14px!important;font-weight:500;width:100%;outline:none!important;transition:border-color .2s,box-shadow .2s;box-shadow:none!important}
.ym-fi:focus{border-color:var(--ym-lime)!important;box-shadow:0 0 0 3px var(--ym-lime-g)!important}
.ym-fi::placeholder{color:var(--ym-t3)!important}
.ym-startbtn{background:var(--ym-lime)!important;color:#08090d!important;border:none!important;padding:12px!important;border-radius:10px;font-size:14px!important;font-weight:800!important;cursor:pointer;width:100%;letter-spacing:.3px;transition:transform .15s,box-shadow .15s;margin-top:4px}
.ym-startbtn:hover{transform:translateY(-1px)!important;box-shadow:0 6px 20px var(--ym-lime-g)!important}
.ym-privacy{font-size:12px;color:var(--ym-t3);line-height:1.7}
.ym-privacy a{color:var(--ym-t2)!important;text-decoration:none!important;border-bottom:1px solid var(--ym-rim)}
.ym-splash-divider{display:flex;align-items:center;gap:10px;width:100%;color:var(--ym-t3);font-size:10px;text-transform:uppercase;letter-spacing:1px}
.ym-splash-divider::before,.ym-splash-divider::after{content:'';flex:1;height:1px;background:var(--ym-rim)}
.ym-splash-zip{border:1.5px dashed var(--ym-violet-d);border-radius:12px;padding:16px 14px;text-align:center;cursor:pointer;transition:border-color .2s,background .2s;width:100%}
.ym-splash-zip:hover,.ym-splash-zip.drag{border-color:var(--ym-violet);background:rgba(139,92,246,.08)}
.ym-splash-zip p{font-size:12px;color:var(--ym-t2);margin-top:6px;line-height:1.5}
.ym-checklist-link{background:none!important;border:none!important;color:var(--ym-t2)!important;font-size:11px!important;cursor:pointer;text-decoration:underline;padding:0!important}
.ym-checklist-link:hover{color:var(--ym-lime)!important}
.ym-cl-group{margin-bottom:16px}
.ym-cl-tool{font-size:12px;font-weight:800;color:var(--ym-lime);margin-bottom:6px;display:flex;align-items:center;gap:6px}
.ym-cl-tag{font-size:8px;font-weight:800;letter-spacing:.5px;text-transform:uppercase;padding:2px 6px;border-radius:4px;margin-left:auto}
.ym-cl-req{background:var(--ym-lime-d);color:var(--ym-lime)}
.ym-cl-opt{background:var(--ym-rim2);color:var(--ym-t3)}
.ym-cl-item{font-size:11.5px;color:var(--ym-t2);line-height:1.6;padding:6px 0 6px 4px;border-left:2px solid var(--ym-rim);padding-left:10px;margin-bottom:6px}
.ym-cl-item b{color:var(--ym-text)}
/* APP */
.ym-app{display:none;flex-direction:column;height:100%}
.ym-app.on{display:flex}
/* TOPBAR */
.ym-topbar{background:var(--ym-ink2)!important;border-bottom:1px solid var(--ym-rim);display:flex;align-items:center;padding:0 14px;gap:9px;height:48px;flex-shrink:0;color:var(--ym-text)!important}
.ym-brand{font-size:13px;font-weight:800;letter-spacing:-.3px;color:var(--ym-text);white-space:nowrap}
.ym-brand span{color:var(--ym-lime)}
.ym-proj{background:var(--ym-raised);border:1px solid var(--ym-rim);border-radius:5px;padding:3px 9px;font-size:10px;font-weight:700;color:var(--ym-t2);display:flex;align-items:center;gap:5px;white-space:nowrap;max-width:140px;overflow:hidden;text-overflow:ellipsis}
.ym-proj::before{content:'';width:5px;height:5px;border-radius:50%;background:var(--ym-lime);flex-shrink:0;animation:ym-pulse 2s infinite}
@keyframes ym-pulse{0%,100%{opacity:1}50%{opacity:.4}}
.ym-sp{flex:1}
.ym-period{font-size:9px;color:var(--ym-t3);white-space:nowrap}
.ym-tbtn{background:none!important;border:1px solid var(--ym-rim)!important;color:var(--ym-t2)!important;padding:5px 11px!important;border-radius:7px;cursor:pointer;font-size:11px!important;font-weight:600!important;transition:all .15s;white-space:nowrap;line-height:1!important}
.ym-tbtn:hover{border-color:var(--ym-lime)!important;color:var(--ym-lime)!important}
.ym-tbtn.ym-danger:hover{border-color:var(--ym-coral)!important;color:var(--ym-coral)!important}
.ym-tbtn.ym-primary{background:var(--ym-lime)!important;color:#08090d!important;border-color:var(--ym-lime)!important}
.ym-tbtn.ym-primary:hover{box-shadow:0 0 12px var(--ym-lime-g)!important}
/* BODY */
.ym-body{display:flex;flex:1;min-height:0;overflow:hidden}
/* SIDEBAR */
.ym-sb{width:210px;flex-shrink:0;background:var(--ym-ink2)!important;border-right:1px solid var(--ym-rim);display:flex;flex-direction:column;overflow-y:auto;color:var(--ym-text)!important}
.ym-sbsec{padding:11px;border-bottom:1px solid var(--ym-rim2)}
.ym-sblbl{font-size:9px;font-weight:800;letter-spacing:2px;text-transform:uppercase;color:var(--ym-t3);margin-bottom:8px}
.ym-dropz{border:1.5px dashed rgba(255,255,255,.1);border-radius:8px;padding:11px 8px;text-align:center;cursor:pointer;transition:border-color .2s,background .2s}
.ym-dropz:hover,.ym-dropz.drag{border-color:var(--ym-violet);background:rgba(139,92,246,.1)}
.ym-dropz p{font-size:10px;color:var(--ym-t3);margin-top:4px;line-height:1.5}
.ym-dropcta{display:block;margin-top:7px;background:var(--ym-violet-btn)!important;color:#fff!important;padding:5px 0!important;border-radius:6px;font-size:10px!important;font-weight:700!important;cursor:pointer;border:none!important;width:100%}
.ym-nav{padding:5px}
.ym-ni{display:flex;align-items:center;gap:7px;padding:7px 9px;border-radius:7px;cursor:pointer;font-size:13px;font-weight:500;color:var(--ym-t2);transition:all .15s;margin:1px 0}
.ym-ni:hover{background:var(--ym-rim2);color:var(--ym-text)}
.ym-ni.active{background:var(--ym-lime-d);color:var(--ym-lime)}
.ym-nic{width:13px;text-align:center;font-size:11px;flex-shrink:0}
.ym-slot{display:flex;align-items:center;gap:6px;padding:4px 0;border-bottom:1px solid var(--ym-rim2);font-size:10px}
.ym-slot:last-child{border-bottom:none}
.ym-sdot{width:5px;height:5px;border-radius:50%;background:var(--ym-t3);flex-shrink:0}
.ym-sdot.ok{background:var(--ym-lime);box-shadow:0 0 5px var(--ym-lime-g)}
.ym-sname{color:var(--ym-t3);flex:1;line-height:1.3}
.ym-sname.ok{color:var(--ym-t2)}
/* MAIN */
.ym-main{flex:1;overflow-y:auto;padding:18px;background:var(--ym-ink)!important;color:var(--ym-text)!important}
/* PANELS */
.ym-panel{display:none}
.ym-panel.active{display:block;animation:ym-up .2s ease}
@keyframes ym-up{from{opacity:0;transform:translateY(7px)}to{opacity:1;transform:translateY(0)}}
/* KPI */
.ym-kgrid{display:grid;grid-template-columns:repeat(4,1fr);gap:11px;margin-bottom:18px}
.ym-kcard{background:var(--ym-raised)!important;border:1px solid var(--ym-rim);border-radius:13px;padding:16px;position:relative;overflow:hidden;animation:ym-up .3s ease both;color:var(--ym-text)!important}
.ym-kcard:nth-child(1){animation-delay:.05s}.ym-kcard:nth-child(2){animation-delay:.1s}.ym-kcard:nth-child(3){animation-delay:.15s}.ym-kcard:nth-child(4){animation-delay:.2s}
.ym-kcard::before{content:'';position:absolute;top:-32px;right:-32px;width:80px;height:80px;border-radius:50%;filter:blur(32px);opacity:.45}
.ym-kcard.ym-lime::before{background:var(--ym-lime)}.ym-kcard.ym-violet::before{background:var(--ym-violet)}.ym-kcard.ym-coral::before{background:var(--ym-coral)}.ym-kcard.ym-sky::before{background:var(--ym-sky)}
.ym-klbl{font-size:9px;font-weight:800;letter-spacing:1.5px;text-transform:uppercase;color:var(--ym-t3)}
.ym-kval{font-size:28px;font-weight:800;line-height:1.1;margin:6px 0 4px;letter-spacing:-1px;color:var(--ym-text)}
.ym-kdelta{font-size:10px;font-weight:600}
.ym-up{color:var(--ym-lime)!important}.ym-dn{color:var(--ym-coral)!important}.ym-fl{color:var(--ym-t3)!important}
/* GRIDS */
.ym-g2{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:12px}
.ym-g3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:11px;margin-bottom:16px}
.ym-g2>*,.ym-g3>*,.ym-kgrid>*{min-width:0}
/* CARD */
.ym-card{background:var(--ym-raised)!important;border:1px solid var(--ym-rim);border-radius:13px;padding:16px;color:var(--ym-text)!important;overflow-x:auto;max-width:100%}
.ym-ct{font-size:12px;font-weight:700;color:var(--ym-text);margin-bottom:3px}
.ym-cs{font-size:12px;color:var(--ym-t3);margin-bottom:10px;line-height:1.5}
/* ALERTS */
.ym-alerts{display:flex;flex-direction:column;gap:6px;margin-bottom:16px}
.ym-alert{border-radius:7px;padding:9px 12px;font-size:13px;line-height:1.6;border-left:3px solid;display:flex;gap:8px;align-items:flex-start}
.ym-alert strong{font-weight:700;display:block;margin-bottom:1px}
.ym-ar{background:rgba(255,107,107,.07);border-color:var(--ym-coral)}
.ym-aa{background:rgba(251,191,36,.07);border-color:var(--ym-amber)}
.ym-al{background:rgba(181,242,61,.07);border-color:var(--ym-lime)}
.ym-av{background:rgba(139,92,246,.07);border-color:var(--ym-violet)}
.ym-ai{font-size:12px;flex-shrink:0;margin-top:1px}
/* CTX */
.ym-ctx{border-radius:11px;padding:13px 16px;margin-bottom:16px;background:linear-gradient(135deg,rgba(255,107,107,.07),rgba(139,92,246,.07));border:1px solid rgba(255,107,107,.2);display:flex;gap:11px}
.ym-ctx-ic{font-size:18px;flex-shrink:0}
.ym-ctx h3{font-size:11px;font-weight:800;color:var(--ym-coral);margin-bottom:4px}
.ym-ctx p{font-size:13px;color:rgba(232,234,246,.8);line-height:1.7}
/* TABLE */
.ym-dt{width:100%;border-collapse:collapse;font-size:11px;background:transparent!important;color:var(--ym-text)!important}
.ym-dt th{text-align:left;padding:6px 8px;color:var(--ym-t3)!important;font-size:9px;text-transform:uppercase;letter-spacing:1px;font-weight:700;border-bottom:1px solid var(--ym-rim);background:transparent!important}
.ym-dt td{padding:7px 8px;border-bottom:1px solid var(--ym-rim2);vertical-align:middle;color:var(--ym-text)!important;background:transparent!important}
.ym-dt tr{background:transparent!important}
.ym-dt tr:last-child td{border-bottom:none}
.ym-dt tr:hover td{background:var(--ym-rim2)}
.ym-mono{font-family:monospace;font-size:10px;color:var(--ym-sky)!important}
/* PILLS */
.ym-pill{display:inline-flex;align-items:center;padding:1px 6px;border-radius:20px;font-size:9px;font-weight:800;letter-spacing:.5px}
.ym-pr{background:rgba(255,107,107,.15);color:var(--ym-coral);border:1px solid rgba(255,107,107,.3)}
.ym-pa{background:rgba(251,191,36,.12);color:var(--ym-amber);border:1px solid rgba(251,191,36,.3)}
.ym-pl{background:rgba(181,242,61,.12);color:var(--ym-lime);border:1px solid rgba(181,242,61,.3)}
.ym-pv{background:rgba(139,92,246,.12);color:var(--ym-violet-text);border:1px solid rgba(139,92,246,.3)}
.ym-ps{background:rgba(56,189,248,.12);color:var(--ym-sky);border:1px solid rgba(56,189,248,.3)}
/* CHANNEL BARS */
.ym-chbar{margin-bottom:10px}
.ym-chtop{display:flex;justify-content:space-between;margin-bottom:4px;font-size:11px}
.ym-chtrack{height:5px;background:var(--ym-lifted);border-radius:3px;overflow:hidden}
.ym-chfill{height:100%;border-radius:3px;transition:width .8s cubic-bezier(.4,0,.2,1)}
/* POS */
.ym-pca{padding:1px 5px;border-radius:4px;font-size:9px;font-weight:800;background:rgba(181,242,61,.15);color:var(--ym-lime)}
.ym-pcb{padding:1px 5px;border-radius:4px;font-size:9px;font-weight:800;background:rgba(251,191,36,.12);color:var(--ym-amber)}
.ym-pcc{padding:1px 5px;border-radius:4px;font-size:9px;font-weight:800;background:rgba(255,107,107,.12);color:var(--ym-coral)}
/* ICHIPS */
.ym-ichips{display:flex;flex-wrap:wrap;gap:6px;margin-bottom:14px}
.ym-ichip{background:var(--ym-lifted)!important;border:1px solid var(--ym-rim);border-radius:7px;padding:6px 11px;font-size:12px;color:var(--ym-t2)!important;line-height:1.5}
.ym-ichip strong{color:var(--ym-text);display:block;font-size:10px;margin-bottom:1px}
/* ACTIONS */
.ym-at-wrap{overflow-x:auto}
.ym-at{width:100%;border-collapse:collapse;font-size:11px;min-width:580px;color:var(--ym-text)!important;background:transparent!important}
.ym-at th{text-align:left;padding:7px 9px;font-size:9px;font-weight:800;text-transform:uppercase;letter-spacing:1px;color:var(--ym-t3)!important;border-bottom:1px solid var(--ym-rim);background:var(--ym-surface)!important}
.ym-at td{padding:8px 9px;border-bottom:1px solid var(--ym-rim2);vertical-align:top;color:var(--ym-text)!important;background:transparent!important}
.ym-at tr.done td{opacity:.4}
.ym-at tr.done .ym-atxt{text-decoration:line-through}
.ym-at tr:hover td{background:var(--ym-rim2)}
.ym-chk{width:15px;height:15px;border-radius:3px;border:1.5px solid var(--ym-t3)!important;background:none!important;cursor:pointer;display:inline-flex;align-items:center;justify-content:center;transition:all .15s;vertical-align:middle}
.ym-chk.done{background:var(--ym-lime)!important;border-color:var(--ym-lime)!important}
.ym-chk.done::after{content:'✓';font-size:9px;color:#08090d;font-weight:900}
/* ANNOTATIONS */
.ym-annform{background:var(--ym-surface)!important;border:1px solid var(--ym-rim);border-radius:11px;padding:14px;margin-bottom:14px;color:var(--ym-text)!important}
.ym-annrow{display:grid;grid-template-columns:135px 155px 1fr auto;gap:7px;align-items:end}
.ym-fg{display:flex;flex-direction:column;gap:4px}
.ym-fc{background:var(--ym-raised)!important;border:1px solid var(--ym-rim)!important;color:var(--ym-text)!important;border-radius:7px;padding:7px 10px!important;font-size:12px!important;width:100%;outline:none!important}
.ym-fc:focus{border-color:var(--ym-violet)!important;box-shadow:0 0 0 3px var(--ym-violet-d)!important}
textarea.ym-fc{resize:vertical;min-height:58px}
.ym-btnadd{background:var(--ym-violet-btn)!important;color:#fff!important;border:none!important;padding:7px 14px!important;border-radius:7px;font-size:11px!important;font-weight:700!important;cursor:pointer;white-space:nowrap;align-self:flex-end}
.ym-annitem{border:1px solid var(--ym-rim);border-radius:7px;padding:10px 12px;margin-bottom:7px}
.ym-annmeta{display:flex;align-items:center;gap:7px;margin-bottom:4px;font-size:10px;color:var(--ym-t3)}
.ym-anntxt{font-size:14px;line-height:1.6}
.ym-btndel{background:none!important;border:1px solid var(--ym-rim)!important;color:var(--ym-t3)!important;padding:2px 8px!important;border-radius:5px;cursor:pointer;font-size:10px!important;margin-left:auto}
.ym-btndel:hover{border-color:var(--ym-coral)!important;color:var(--ym-coral)!important}
/* MODAL */
.ym-modal-bg{position:absolute;inset:0;background:rgba(0,0,0,.75);backdrop-filter:blur(8px);z-index:200;align-items:center;justify-content:center;display:none;border-radius:16px}
.ym-modal-bg.open{display:flex}
.ym-modal{background:var(--ym-raised)!important;border:1px solid var(--ym-rim);border-radius:14px;padding:28px 32px;max-width:360px;width:90%;text-align:center;color:var(--ym-text)!important}
.ym-modal h2{font-size:18px;font-weight:800;margin-bottom:8px;color:var(--ym-text)}
.ym-modal p{font-size:13px;color:var(--ym-t2);line-height:1.7;margin-bottom:20px}
.ym-modal-btns{display:flex;gap:9px;justify-content:center}
.ym-btncancel{background:none!important;border:1px solid var(--ym-rim)!important;color:var(--ym-t2)!important;padding:8px 18px!important;border-radius:7px;cursor:pointer;font-size:12px!important;font-weight:600!important}
.ym-btnreset{background:var(--ym-coral)!important;color:#fff!important;border:none!important;padding:8px 18px!important;border-radius:7px;cursor:pointer;font-size:12px!important;font-weight:700!important}
/* FLOW */
.ym-flow-lbl{display:flex;justify-content:space-between;font-size:9px;color:var(--ym-t3);margin-bottom:7px}
.ym-flow-row{display:flex;align-items:center;gap:5px;margin-bottom:9px}
.ym-flow-name{width:76px;font-size:9px;font-weight:700;color:var(--ym-t2);text-align:right;flex-shrink:0}
.ym-flow-bar{flex:1;height:15px;background:var(--ym-lifted);border-radius:7px;overflow:hidden;position:relative}
.ym-flow-fill{height:100%;border-radius:7px;opacity:.35}
.ym-flow-barlbl{position:absolute;top:50%;left:6px;transform:translateY(-50%);font-size:9px;font-weight:700;color:var(--ym-text)}
.ym-flow-leads{width:44px;height:12px;background:var(--ym-lifted);border-radius:6px;overflow:hidden;position:relative;flex-shrink:0}
.ym-flow-lfill{height:100%;border-radius:6px;background:#ff6b6b}
.ym-flow-llbl{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-size:9px;font-weight:700;color:var(--ym-text)}
.ym-flow-conv{width:30px;font-size:9px;font-weight:700;text-align:right;flex-shrink:0}
/* SCROLLBAR */
.ym-main::-webkit-scrollbar,.ym-sb::-webkit-scrollbar{width:4px}
.ym-main::-webkit-scrollbar-track,.ym-sb::-webkit-scrollbar-track{background:transparent}
.ym-main::-webkit-scrollbar-thumb,.ym-sb::-webkit-scrollbar-thumb{background:var(--ym-lifted);border-radius:2px}
/* RESPONSIVE */
@media(max-width:1240px){.ym-g3{grid-template-columns:1fr 1fr}}
@media(max-width:1100px){.ym-g2{grid-template-columns:1fr}.ym-g3{grid-template-columns:1fr}.ym-sb{width:170px}}
@media(max-width:860px){.ym-kgrid{grid-template-columns:1fr 1fr}.ym-g2{grid-template-columns:1fr}.ym-g3{grid-template-columns:1fr}}
@media(max-width:600px){.ym-sb{display:none}.ym-annrow{grid-template-columns:1fr 1fr}.ym-annrow>*:last-child{grid-column:1/-1}.ym-kgrid{grid-template-columns:1fr}}
/* Los @media de arriba solo miran el ancho de la ventana del navegador — pero este dashboard vive dentro
   de la columna de contenido de un tema de WordPress, que casi siempre es más estrecha que la ventana
   (sidebar, márgenes del tema, editor de Elementor...). Por eso las tablas se veían mal en portátiles
   normales aunque el @media nunca llegara a saltar. Los @container de abajo miden el ancho REAL del
   propio #ym-analytics-root y son los que de verdad gobiernan el layout en la mayoría de instalaciones. */
@container ymapp (max-width:1240px){.ym-g3{grid-template-columns:1fr 1fr}}
@container ymapp (max-width:1100px){.ym-g2{grid-template-columns:1fr}.ym-g3{grid-template-columns:1fr}.ym-sb{width:170px}}
@container ymapp (max-width:860px){.ym-kgrid{grid-template-columns:1fr 1fr}.ym-g2{grid-template-columns:1fr}.ym-g3{grid-template-columns:1fr}.ym-dt{font-size:10px}.ym-dt td,.ym-dt th{padding:5px 6px!important;white-space:nowrap}}
@container ymapp (max-width:640px){.ym-sb{display:none}.ym-annrow{grid-template-columns:1fr 1fr}.ym-annrow>*:last-child{grid-column:1/-1}.ym-kgrid{grid-template-columns:1fr}}
</style>

<!-- SPLASH -->
<div class="ym-splash">
  <div class="ym-splash-mesh"></div>
  <div class="ym-splash-inner">
    <div class="ym-sig">Yel Martínez · yelmartinez.com</div>
    <div class="ym-title">Analytics<br><span>Intelligence</span></div>
    <div class="ym-sub">Análisis SEO y marketing digital. Datos en memoria — se borran al cerrar.</div>
    <div class="ym-sform">
      <div><label class="ym-flbl">Proyecto / Cliente</label><input class="ym-fi" id="ymPN" type="text" placeholder="ej. Yel Martínez Portfolio" autocomplete="off"></div>
      <div><label class="ym-flbl">Analista</label><input class="ym-fi" id="ymAN" type="text" placeholder="Tu nombre" autocomplete="off"></div>
      <button class="ym-startbtn" onclick="ymStart()">Iniciar análisis →</button>
    </div>
    <div class="ym-splash-divider">o</div>
    <div class="ym-splash-zip" id="ymSplashDZ" onclick="document.getElementById('ymSplashCI').click()" ondragover="event.preventDefault();this.classList.add('drag')" ondragleave="this.classList.remove('drag')" ondrop="ymSplashDrop(event)">
      <div style="font-size:20px">📦</div>
      <p>Arrastra aquí tu <b style="color:var(--ym-text)">ZIP con todo ya preparado</b><br>y empieza directamente</p>
    </div>
    <input type="file" id="ymSplashCI" accept=".zip,.csv,.pdf" style="display:none" onchange="ymSplashHF(this.files)">
    <button type="button" class="ym-checklist-link" onclick="document.getElementById('ymChecklistModal').classList.add('open')">📋 ¿Qué archivos tengo que preparar? Ver checklist</button>
    <div class="ym-privacy">🔒 Sin servidor · Sin cookies · Sin almacenamiento permanente<br><a href="https://yelmartinez.com" target="_blank">yelmartinez.com</a></div>
  </div>
</div>

<!-- APP -->
<div class="ym-app" id="ymApp">
  <div class="ym-topbar">
    <div class="ym-brand">YM <span>Analytics</span></div>
    <div class="ym-proj" id="ymTP">–</div>
    <div class="ym-sp"></div>
    <div class="ym-period" id="ymPer">Carga los CSVs</div>
    <button class="ym-tbtn ym-primary" onclick="ymPDF()">↓ PDF</button>
    <button class="ym-tbtn ym-danger" onclick="document.getElementById('ymRM').classList.add('open')">⟳ Reset</button>
  </div>
  <div class="ym-body">
    <div class="ym-sb">
      <div class="ym-sbsec">
        <div class="ym-sblbl">Datos GA4</div>
        <div class="ym-dropz" id="ymDZ" onclick="document.getElementById('ymCI').click()" ondragover="event.preventDefault();this.classList.add('drag')" ondragleave="this.classList.remove('drag')" ondrop="ymDrop(event)">
          <div style="font-size:19px">📂</div>
          <p>Arrastra CSVs, un .zip con todo, o PDFs históricos</p>
          <button class="ym-dropcta" onclick="event.stopPropagation();document.getElementById('ymCI').click()">Seleccionar</button>
        </div>
        <input type="file" id="ymCI" multiple accept=".csv,.pdf,.zip" style="display:none" onchange="ymHF(this.files)">
        <div id="ymZipStatus" style="font-size:9px;color:var(--ym-t3);margin-top:6px;line-height:1.5"></div>
      </div>
      <div class="ym-sbsec"><div class="ym-sblbl">Fuentes</div><div id="ymSL"></div></div>
      <div class="ym-nav">
        <div class="ym-ni active" onclick="ymTab('diag',this)"><span class="ym-nic">🔬</span>Diagnóstico</div>
        <div class="ym-ni" onclick="ymTab('ann',this)"><span class="ym-nic">✎</span>Anotaciones (contexto)</div>
        <div class="ym-ni" onclick="ymTab('overview',this)"><span class="ym-nic">◈</span>Resumen</div>
        <div class="ym-ni" onclick="ymTab('seo',this)"><span class="ym-nic">🔍</span>SEO</div>
        <div class="ym-ni" onclick="ymTab('onpage',this)"><span class="ym-nic">📝</span>On-Page</div>
        <div class="ym-ni" onclick="ymTab('kwtrack',this)"><span class="ym-nic">📌</span>Seguimiento KWs</div>
        <div class="ym-ni" onclick="ymTab('vis',this)"><span class="ym-nic">👁️</span>Visibilidad</div>
        <div class="ym-ni" onclick="ymTab('canales',this)"><span class="ym-nic">↗</span>Canales</div>
        <div class="ym-ni" onclick="ymTab('comp',this)"><span class="ym-nic">◎</span>Comportamiento</div>
        <div class="ym-ni" onclick="ymTab('leads',this)"><span class="ym-nic">⚡</span>Leads</div>
        <div class="ym-ni" onclick="ymTab('strategy',this)"><span class="ym-nic">🧠</span>Estrategia</div>
        <div class="ym-ni" onclick="ymTab('crawl',this)"><span class="ym-nic">🕷️</span>Rastreo</div>
        <div class="ym-ni" onclick="ymTab('enlazado',this)"><span class="ym-nic">🕸️</span>Enlazado</div>
        <div class="ym-ni" onclick="ymTab('acc',this)"><span class="ym-nic">✦</span>Plan de acción</div>
      </div>
    </div>
    <div class="ym-main">
      <!-- OVERVIEW -->
      <!-- DIAGNÓSTICO -->
      <div class="ym-panel active" id="ym-diag">
        <div class="ym-alert ym-av" style="margin-bottom:13px"><span class="ym-ai">🔬</span><div><strong>Hallazgos cruzados entre TODAS tus fuentes cargadas</strong>No son alertas sueltas por panel — son conexiones causa-efecto entre lo que ves en SEO, canales, leads, el log del servidor y el rastreo técnico, con una recomendación concreta cada una.</div></div>
        <div id="ymDIAG"></div>
        <div class="ym-alert ym-av" style="margin-top:14px;margin-bottom:14px"><span class="ym-ai">🤖</span><div><strong>¿Dudas sobre cualquiera de estos hallazgos?</strong>El chatbot de IA (botón flotante, abajo a la derecha) está disponible en cualquier pestaña — no hace falta volver aquí.</div></div>
        <div class="ym-card" style="margin-top:14px"><div class="ym-ct">📈 Evolución histórica</div><div class="ym-cs">Sube exportaciones PDF anteriores de este mismo dashboard para trazar tendencia real, no solo período actual vs. anterior</div>
          <div id="ymHISTSetup" style="margin-bottom:10px"></div>
          <div id="ymHISTChartWrap" style="height:200px"><canvas id="ymHISTChart"></canvas></div>
          <div id="ymHISTTable"></div>
        </div>
      </div>
      <div class="ym-panel" id="ym-overview">
        <div id="ymHEALTH"></div>
        <div id="ymPRIO"></div>
        <div class="ym-kgrid" id="ymKP"></div>
        <div id="ymCTX"></div>
        <div class="ym-alerts" id="ymAL"></div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">Retención por cohortes semanales</div><div class="ym-cs">Usuarios que vuelven cada semana desde su primera visita</div><div id="ymTRWrap" style="height:210px"><canvas id="ymTR"></canvas></div></div>
          <div class="ym-card"><div class="ym-ct">Flujo Canales → Leads</div><div class="ym-cs">Sesiones vs conversiones</div><div id="ymFL" style="height:210px;display:flex;align-items:center"></div></div>
        </div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">Sesiones por canal</div><div style="height:180px"><canvas id="ymDN"></canvas></div></div>
          <div class="ym-card"><div class="ym-ct">Calidad por canal</div><div class="ym-cs">Tasa interacción actual vs anterior</div><div id="ymCQ"></div></div>
        </div>
      </div>
      <!-- SEO -->
      <div class="ym-panel" id="ym-seo">
        <div id="ymSEOAn"></div>
        <div class="ym-ichips" id="ymSC"></div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">Clics orgánicos actual vs anterior</div><div style="height:200px"><canvas id="ymSK"></canvas></div></div>
          <div class="ym-card"><div class="ym-ct">Impresiones vs CTR</div><div class="ym-cs">X: impr · Y: CTR% · Tamaño: clics</div><div style="height:200px"><canvas id="ymSS"></canvas></div></div>
        </div>
        <div class="ym-card" style="margin-bottom:14px"><div class="ym-ct">Top consultas</div><div id="ymQT"></div></div>
        <div class="ym-card" style="margin-bottom:14px"><div class="ym-ct">🔬 Diagnóstico por URL</div><div class="ym-cs">Cruce de Search Console + título/meta/H1/contenido/enlaces de tu rastreo Screaming Frog — todas las URLs con interés de búsqueda, sin recortar</div><div id="ymOT"></div></div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">🔗 Interlinking recomendado</div><div class="ym-cs">Páginas con interés real y pocos enlaces internos</div><div id="ymILK"></div></div>
          <div class="ym-card"><div class="ym-ct">📈 Prioridad off-page</div><div class="ym-cs">Buena posición, pocos backlinks — máximo retorno por enlace conseguido</div><div id="ymOFF"></div></div>
        </div>
      </div>
      <!-- ON-PAGE -->
      <div class="ym-panel" id="ym-onpage">
        <div class="ym-alert ym-av" style="margin-bottom:13px"><span class="ym-ai">📝</span><div><strong>Auditoría on-page y técnica</strong>Títulos, metas, H1, canonicals, contenido duplicado, datos estructurados, accesibilidad, códigos de respuesta de tu propio rastreo y PageSpeed — cada export de Screaming Frog en su propia tarjeta.</div></div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">🔤 Títulos de página</div><div class="ym-cs">Duplicados y fuera del rango recomendado (~50-60 caracteres)</div><div id="ymOPTitles"></div></div>
          <div class="ym-card"><div class="ym-ct">📄 Meta descriptions</div><div class="ym-cs">Duplicadas, ausentes o fuera de rango (~120-158 caracteres)</div><div id="ymOPMetas"></div></div>
        </div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">🏷️ H1</div><div class="ym-cs">Duplicados, ausentes o múltiples en la misma página</div><div id="ymOPH1"></div></div>
          <div class="ym-card"><div class="ym-ct">🔗 Canonicals</div><div class="ym-cs">Ausentes o apuntando a una URL distinta de la propia</div><div id="ymOPCanon"></div></div>
        </div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">📑 Contenido duplicado</div><div class="ym-cs">Casi-duplicados y semiduplicados detectados por similitud</div><div id="ymOPContent"></div></div>
          <div class="ym-card"><div class="ym-ct">🧩 Datos estructurados (JSON-LD)</div><div class="ym-cs">Errores y advertencias por página</div><div id="ymOPStruct"></div></div>
        </div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">♿ Accesibilidad (WCAG)</div><div class="ym-cs">Infracciones por nivel — A, AA, AAA y buenas prácticas</div><div id="ymOPA11y"></div></div>
          <div class="ym-card"><div class="ym-ct">🚦 Códigos de respuesta (tu propio rastreo)</div><div class="ym-cs">2xx/3xx/4xx/5xx encontrados al rastrear, no los de Googlebot</div><div id="ymOPResp"></div></div>
        </div>
        <div class="ym-card"><div class="ym-ct">⚡ PageSpeed / Core Web Vitals</div><div class="ym-cs">Rendimiento real por página, no solo el agregado del origen</div><div id="ymOPSpeed"></div></div>
      </div>
      <!-- SEGUIMIENTO KWS -->
      <div class="ym-panel" id="ym-kwtrack">
        <div class="ym-alert ym-av" style="margin-bottom:13px"><span class="ym-ai">📌</span><div><strong>Visibilidad y seguimiento de keywords</strong>Tipo de intención, coincidencia real con tu contenido (título/H1), interés en el meta (CTR) vs. interés en el contenido (tiempo/eventos en la página), huecos de contenido, y tu propia lista de keywords a vigilar.</div></div>
        <div class="ym-card" style="margin-bottom:14px"><div class="ym-ct">⭐ Seguimiento activo</div><div class="ym-cs">Las keywords que marques aquí se guardan en el PDF exportado — al subir un PDF anterior, verás su evolución</div>
          <div style="display:flex;gap:8px;margin-bottom:10px;flex-wrap:wrap;align-items:flex-end">
            <div class="ym-fg" style="flex:1;min-width:200px"><label class="ym-flbl">Añadir keyword a seguir</label><input class="ym-fc" type="text" id="ymKwAdd" placeholder="Escribe la keyword exacta tal como aparece en Consultas"></div>
            <button class="ym-startbtn" style="padding:9px 16px;width:auto" onclick="ymTrackKw()">+ Seguir</button>
          </div>
          <div id="ymKwWatch"></div>
        </div>
        <div class="ym-card" style="margin-bottom:14px"><div class="ym-ct">🔬 Inteligencia de keywords</div><div class="ym-cs">Todas tus consultas: tipo, posición, coincidencia con tu contenido real, e interés de contenido de la página que mejor responde</div><div id="ymKwIntel"></div></div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">🕳️ Huecos de contenido</div><div class="ym-cs">Impresiones reales sin ninguna página que coincida en título/H1</div><div id="ymKwGap"></div></div>
          <div class="ym-card"><div class="ym-ct">🗂️ Clusters temáticos</div><div class="ym-cs">Consultas agrupadas por palabras compartidas — candidatas a una misma página pilar</div><div id="ymKwClusters"></div></div>
        </div>
      </div>
      <!-- VISIBILIDAD -->
      <div class="ym-panel" id="ym-vis">
        <div class="ym-card" style="margin-bottom:14px"><div class="ym-ct">📈 Índice de visibilidad</div><div class="ym-cs">Evolución de tus keywords en seguimiento — como el índice de Sistrix, pero calculado solo con tus propios datos</div><div style="height:220px"><canvas id="ymVISIndex"></canvas></div><div id="ymVISIndexNote" style="margin-top:8px"></div></div>
        <div id="ymVISAn" style="margin-bottom:13px"></div>
        <div class="ym-g3" id="ymVISKPI"></div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">📇 Indexabilidad — por qué Google puede NO estar viendo tu contenido</div><div class="ym-cs">Estado real de cada URL rastreada</div><div id="ymVISIDX"></div></div>
          <div class="ym-card"><div class="ym-ct">🏷️ Meta robots y canonical</div><div class="ym-cs">Directivas que le dicen a Google qué indexar</div><div id="ymVISROB"></div></div>
        </div>
        <div class="ym-card" style="margin-bottom:14px"><div class="ym-ct">🔍 Aparición en búsquedas (Search Console)</div><div class="ym-cs">Cómo y dónde aparece tu web en los resultados — no solo posición, sino formato</div><div id="ymVISAPP"></div></div>
        <div class="ym-card"><div class="ym-ct">🔗 Visibilidad externa (backlinks)</div><div class="ym-cs">Quién más te hace visible fuera de tu propia web</div><div id="ymVISBK"></div></div>
      </div>
      <!-- CANALES -->
      <div class="ym-panel" id="ym-canales">
        <div id="ymCANAn"></div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">Sesiones por canal</div><div style="height:210px"><canvas id="ymSB"></canvas></div></div>
          <div class="ym-card"><div class="ym-ct">Usuarios nuevos por canal</div><div style="height:210px"><canvas id="ymUB"></canvas></div></div>
        </div>
        <div class="ym-card"><div class="ym-ct">Detalle por canal</div><div id="ymCD"></div></div>
      </div>
      <!-- COMPORTAMIENTO -->
      <div class="ym-panel" id="ym-comp">
        <div id="ymCOMPAn"></div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">🗺️ Heatmap de páginas</div><div class="ym-cs">X: sesiones · Y: conv% · Tamaño: tiempo</div><div style="height:250px"><canvas id="ymHM"></canvas></div></div>
          <div class="ym-card"><div class="ym-ct">Top eventos</div><div style="height:250px"><canvas id="ymEV"></canvas></div></div>
        </div>
        <div class="ym-card"><div class="ym-ct">Top páginas y pantallas</div><div id="ymPG"></div></div>
        <div class="ym-card"><div class="ym-ct">Páginas de destino · sesiones vs tiempo</div><div style="height:210px;max-width:640px"><canvas id="ymLD"></canvas></div></div>
      </div>
      <!-- LEADS -->
      <div class="ym-panel" id="ym-leads">
        <div id="ymLEADSAn"></div>
        <div class="ym-g3" id="ymLK"></div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">Eventos clave por tipo</div><div style="height:210px"><canvas id="ymLB"></canvas></div></div>
          <div class="ym-card"><div class="ym-ct">Leads por canal</div><div style="height:210px"><canvas id="ymLS"></canvas></div></div>
        </div>
        <div class="ym-card"><div id="ymLD2"></div></div>
      </div>
      <!-- ESTRATEGIA -->
      <div class="ym-panel" id="ym-strategy">
        <div id="ymROADMAP" style="margin-bottom:14px"></div>
        <div class="ym-alert ym-av" style="margin-bottom:13px"><span class="ym-ai">🧠</span><div><strong>Análisis avanzado calculado sobre tus propios datos</strong>Zona de impacto, curva CTR real, significancia de cambios, correlaciones, Pareto, canal IA y posible canibalización.</div></div>
        <div class="ym-card"><div class="ym-ct">🎯 Zona de impacto (Striking Distance)</div><div class="ym-cs">Consultas en posición 4-15 con impresiones altas → quick wins</div><div id="ymSDZ"></div></div>
        <div class="ym-card"><div class="ym-ct">📈 Curva CTR real por rango de posición</div><div class="ym-cs">Tu CTR medio observado, no un % fijo</div><div style="height:190px;max-width:640px"><canvas id="ymCTRC"></canvas></div></div>
        <div class="ym-card" style="margin-bottom:14px"><div class="ym-ct">📉 Consultas por debajo de su curva de CTR</div><div id="ymCTRU"></div></div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">🔬 Significancia del cambio</div><div class="ym-cs">Distingue una caída real de ruido estadístico normal</div><div id="ymSIG"></div></div>
          <div class="ym-card"><div class="ym-ct">🔗 Correlación entre métricas</div><div class="ym-cs">Coeficiente de Pearson sobre tus datos</div><div id="ymCORR"></div></div>
        </div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">📊 Pareto 80/20</div><div class="ym-cs">Qué % de consultas genera el 80% de tus clics</div><div style="height:190px"><canvas id="ymPAR"></canvas></div><div id="ymPARNote"></div></div>
          <div class="ym-card"><div class="ym-ct">🤖 Tráfico desde asistentes IA</div><div class="ym-cs">ChatGPT, Perplexity, Copilot... como canal propio</div><div id="ymAIT"></div></div>
        </div>
        <div class="ym-card"><div class="ym-ct">⚠️ Posible canibalización (proxy por similitud de URL)</div><div class="ym-cs">Requiere Search Console API (page+query) para confirmación exacta — esto es una señal orientativa</div><div id="ymCAN"></div></div>
      </div>
      <!-- RASTREO -->
      <div class="ym-panel" id="ym-crawl">
        <div class="ym-card" style="margin-bottom:14px"><div class="ym-ct">🚨 Salud del servidor (error_log)</div><div class="ym-cs">Errores fatales y avisos reales de PHP</div><div id="ymERR"></div></div>
        <div class="ym-card" style="margin-bottom:14px"><div class="ym-ct">🖥️ Cómo mejorar tu servidor</div><div class="ym-cs">Pasos reales según tu hosting — no genéricos</div>
          <select class="ym-fc" id="ymHostSel" onchange="ymHostGuide()" style="max-width:280px;margin-bottom:10px">
            <option value="raiola">Raiola Networks</option>
            <option value="webempresa">WebEmpresa</option>
            <option value="banahosting" selected>Banahosting</option>
            <option value="generic">Otro hosting con cPanel</option>
          </select>
          <div id="ymHostGuideBox"></div>
        </div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">📡 Solicitudes de rastreo de Googlebot</div><div class="ym-cs">Datos oficiales de Search Console</div><div style="height:190px"><canvas id="ymCST"></canvas></div></div>
          <div class="ym-card"><div class="ym-ct">🗂️ Presupuesto de rastreo por tipo de archivo</div><div class="ym-cs">A qué dedica Googlebot sus visitas</div><div style="height:190px"><canvas id="ymCSF"></canvas></div><div id="ymCSFNote"></div></div>
        </div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">Códigos de respuesta rastreados</div><div id="ymCSR"></div></div>
          <div class="ym-card"><div class="ym-ct">🔗 Backlinks · páginas más enlazadas</div><div id="ymBKL"></div></div>
        </div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">🕸️ Clics (GSC) vs Enlaces internos únicos</div><div class="ym-cs">Páginas con interés real pero poco enlazado interno</div><div id="ymSFI"></div></div>
          <div class="ym-card"><div class="ym-ct">⚠️ Auditoría técnica del rastreo</div><div class="ym-cs">Indexabilidad, duplicados, páginas huérfanas</div><div id="ymSFA"></div></div>
        </div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">📇 Evolución de indexación (GSC Coverage)</div><div class="ym-cs">Indexadas vs. sin indexar en el tiempo, según Search Console</div><div style="height:190px"><canvas id="ymCOVT"></canvas></div></div>
          <div class="ym-card"><div class="ym-ct">🧾 Motivos de exclusión de indexación</div><div class="ym-cs">Lo que Screaming Frog no puede ver por sí solo — solo GSC lo sabe</div><div id="ymCOVI"></div></div>
        </div>
      </div>
      <!-- ENLAZADO -->
      <div class="ym-panel" id="ym-enlazado">
        <div class="ym-alert ym-av" style="margin-bottom:13px"><span class="ym-ai">🕸️</span><div><strong>Arquitectura de enlazado interno</strong>Los diagramas de Screaming Frog (Visualisations → Force-Directed Crawl/Directory Diagram y Crawl/Directory Tree Graph, exportados como HTML) más la detección de páginas huérfanas y mal enlazadas a partir de tu rastreo.</div></div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">🕸️ Diagrama de rastreo forzado</div><div class="ym-cs">Fuerza dirigida por enlaces reales — clusters muy separados suelen ser silos mal conectados</div><div id="ymENLDiagCrawl"></div></div>
          <div class="ym-card"><div class="ym-ct">📁 Diagrama de árbol de directorio forzado</div><div class="ym-cs">Estructura por URL, no por enlaces — útil para ver profundidad real</div><div id="ymENLDiagDir"></div></div>
        </div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">🌳 Gráfico de árbol del rastreo</div><div class="ym-cs">Jerarquía de descubrimiento durante el rastreo</div><div id="ymENLTreeCrawl"></div></div>
          <div class="ym-card"><div class="ym-ct">🗂️ Gráfico de árbol del directorio</div><div class="ym-cs">Jerarquía por estructura de carpetas de la URL</div><div id="ymENLTreeDir"></div></div>
        </div>
        <div class="ym-g2">
          <div class="ym-card"><div class="ym-ct">🚫 Páginas huérfanas</div><div class="ym-cs">Indexables pero sin ningún enlace interno — Google solo las encuentra por sitemap</div><div id="ymENLOrphan"></div></div>
          <div class="ym-card"><div class="ym-ct">🔗 Mal enlazadas con interés real</div><div class="ym-cs">Menos de 8 enlaces internos únicos pese a tener clics o impresiones en Google</div><div id="ymENLUnder"></div></div>
        </div>
      </div>
      <!-- ACCIONES -->
      <div class="ym-panel" id="ym-acc">
        <div class="ym-alert ym-av" style="margin-bottom:13px"><span class="ym-ai">✦</span><div><strong>Plan de acción generado a partir de los datos</strong>Marca cada acción completada para seguir el progreso de la sesión.</div></div>
        <div class="ym-card"><div class="ym-at-wrap"><table class="ym-at"><thead><tr><th></th><th>Acción</th><th>Área</th><th>Prioridad</th><th>Plazo</th><th>Contexto</th><th>Qué hacer</th></tr></thead><tbody id="ymAB"></tbody></table></div></div>
      </div>
      <!-- ANOTACIONES -->
      <div class="ym-panel" id="ym-ann">
        <div class="ym-alert ym-av" style="margin-bottom:13px"><span class="ym-ai">📋</span><div><strong>Esto es la ficha del paciente, no una nota al margen</strong>Sin tu objetivo real y sin saber qué canales de contacto usas de verdad, el Diagnóstico puede acertar en los números y equivocarse en la conclusión (ej.: recomendar "revisa el formulario" cuando tu conversión real es email/LinkedIn). Rellena al menos un 🎯 Objetivo y un 📋 Contexto operativo antes de fiarte del todo del diagnóstico automático.</div></div>
        <div id="ymPatientCard" style="margin-bottom:14px"></div>
        <div class="ym-annform">
          <div class="ym-ct" style="margin-bottom:11px">✎ Nueva anotación</div>
          <div class="ym-annrow">
            <div class="ym-fg"><label class="ym-flbl">Fecha</label><input class="ym-fc" type="date" id="ymAD"></div>
            <div class="ym-fg"><label class="ym-flbl">Tipo</label><select class="ym-fc" id="ymAT"><option value="goal">🎯 Objetivo/Visión</option><option value="context">📋 Contexto operativo</option><option value="crisis">🔴 Crisis reputacional</option><option value="update">🟡 Update Google</option><option value="opp">🟢 Oportunidad</option><option value="note">🔵 Nota</option></select></div>
            <div class="ym-fg"><label class="ym-flbl">Descripción</label><textarea class="ym-fc" id="ymATX" rows="2" placeholder="Ej: Mi conversión real es por email/LinkedIn, no uso formulario. Ej: Mi objetivo es que me encuentren para colaboraciones y oportunidades laborales."></textarea></div>
            <button class="ym-btnadd" onclick="ymAddAnn()">+ Añadir</button>
          </div>
        </div>
        <div id="ymANN"></div>
      </div>
    </div>
  </div>
  <!-- CHATBOT IA FLOTANTE -->
  <button id="ymAIFab" onclick="ymAIToggle()" style="position:absolute;right:24px;bottom:24px;width:52px;height:52px;border-radius:50%;background:var(--ym-violet-btn);border:2px solid #fff2;color:#fff;font-size:22px;cursor:pointer;box-shadow:0 6px 24px rgba(0,0,0,.5);z-index:999999;display:flex;align-items:center;justify-content:center;padding:0">🤖</button>
  <div id="ymAIDrawer" style="display:none;position:absolute;right:24px;bottom:86px;width:340px;max-width:calc(100vw - 36px);height:min(440px,70vh);max-height:calc(100% - 96px);background:var(--ym-raised);border:1px solid var(--ym-rim);border-radius:13px;box-shadow:0 12px 40px rgba(0,0,0,.6);z-index:999999;flex-direction:column;overflow:hidden">
    <div style="padding:11px 14px;border-bottom:1px solid var(--ym-rim);display:flex;justify-content:space-between;align-items:center;flex-shrink:0">
      <div style="font-size:12px;font-weight:700">🤖 Asistente IA</div>
      <div style="display:flex;gap:8px;align-items:center">
        <button onclick="ymAINewChat()" title="Nueva conversación" style="background:none;border:none;color:var(--ym-t3);cursor:pointer;font-size:13px;padding:4px">⟳</button>
        <button onclick="ymAIToggle()" style="background:none;border:none;color:var(--ym-t3);cursor:pointer;font-size:15px;padding:4px">✕</button>
      </div>
    </div>
    <div id="ymAISetup" style="padding:10px 14px"></div>
    <div id="ymAIMessages" style="flex:1;overflow-y:auto;padding:12px 14px;display:flex;flex-direction:column;gap:9px"></div>
    <div style="padding:10px;border-top:1px solid var(--ym-rim);flex-shrink:0">
      <div style="display:flex;gap:6px;margin-bottom:6px">
        <textarea id="ymAIInput" rows="2" placeholder="Pregunta sobre cualquier hallazgo, área o buena práctica SEO..." style="flex:1;resize:none;background:var(--ym-lifted);border:1px solid var(--ym-rim);color:var(--ym-text);border-radius:7px;padding:7px 9px;font-size:11px;outline:none"></textarea>
        <button id="ymAISendBtn" class="ym-startbtn" style="width:44px;padding:0;flex-shrink:0" onclick="ymAISend()">➤</button>
      </div>
      <div style="display:flex;justify-content:space-between;align-items:center">
        <span id="ymAILimitLbl" style="font-size:8px;color:var(--ym-t3)"></span>
        <button onclick="ymAIPreview()" style="background:none;border:none;color:var(--ym-t3);cursor:pointer;font-size:8px;text-decoration:underline">ver qué se envía</button>
      </div>
      <pre id="ymAIPreviewBox" style="display:none;background:var(--ym-lifted);border:1px solid var(--ym-rim);border-radius:7px;padding:8px;font-size:8px;color:var(--ym-t2);max-height:140px;overflow:auto;white-space:pre-wrap;margin-top:6px"></pre>
    </div>
  </div>
  <!-- RESET MODAL -->
  <div class="ym-modal-bg" id="ymRM">
    <div class="ym-modal">
      <div style="font-size:30px;margin-bottom:7px">⟳</div>
      <h2>Nueva sesión</h2>
      <p>Se eliminarán todos los datos del proyecto actual. Sin posibilidad de recuperación.</p>
      <div class="ym-modal-btns">
        <button class="ym-btncancel" onclick="document.getElementById('ymRM').classList.remove('open')">Cancelar</button>
        <button class="ym-btnreset" onclick="ymReset()">Nueva sesión</button>
      </div>
    </div>
  </div>
  <!-- CHECKLIST MODAL -->
  <div class="ym-modal-bg" id="ymChecklistModal">
    <div class="ym-modal" style="max-width:680px;max-height:84vh;overflow-y:auto;text-align:left">
      <h2 style="text-align:center">📋 Qué preparar antes de subir tu ZIP</h2>
      <p style="text-align:center">Descarga estos archivos con cada herramienta, mételos todos juntos en un único <b style="color:var(--ym-text)">.zip</b> (subcarpetas incluidas, no pasa nada) y suéltalo en la casilla de la pantalla anterior. El nombre de cada archivo da igual — este plugin detecta cada uno por su contenido. Nada es obligatorio salvo el crawl de Screaming Frog: cuantos más añadas, más completo el diagnóstico.</p>

      <div class="ym-cl-group">
        <div class="ym-cl-tool">🐸 Screaming Frog SEO Spider <span class="ym-cl-tag ym-cl-req">Imprescindible</span></div>
        <div class="ym-cl-item"><b>Antes de rastrear:</b> Configuration → API Access → conecta <b>Google Analytics 4</b>, <b>Google Search Console</b> y <b>PageSpeed Insights</b>. Así el crawl principal trae unido por URL indexabilidad + GA4 + GSC + Core Web Vitals en un solo archivo.</div>
        <div class="ym-cl-item"><b>Rastrea</b> el dominio completo y deja que termine.</div>
        <div class="ym-cl-item"><b>Crawl principal</b> — pestaña <i>Internal</i> → filtro <i>HTML</i> → Export → CSV. <span class="ym-mono">(dataset: crawl_sf)</span></div>
        <div class="ym-cl-item"><b>El resto, todo desde el menú <i>Bulk Export</i></b> (o su pestaña equivalente) — cada uno es un CSV independiente, expórtalos todos:
          <ul style="margin:6px 0 0 18px;padding:0;font-size:12px;line-height:1.9;">
            <li><b>Accessibility → All Issues</b> — accesibilidad</li>
            <li><b>Content → Near Duplicates</b> — contenido duplicado</li>
            <li><b>Structured Data → All</b> — datos estructurados / rich results</li>
            <li><b>Directives → All</b> — noindex, nofollow, canonical directives</li>
            <li><b>Canonicals → All</b></li>
            <li><b>Page Titles → All</b></li>
            <li><b>Meta Description → All</b></li>
            <li><b>H1 → All</b></li>
            <li><b>Response Codes → All</b> (incluye redirecciones y tiempos de respuesta)</li>
            <li><b>PageSpeed → All</b> (requiere la API de PageSpeed conectada arriba)</li>
          </ul>
        </div>
        <div class="ym-cl-item"><b>Diagramas visuales</b> — menú <i>Visualisations</i> (o <i>Visualizaciones</i>), exporta como HTML cada uno:
          <ul style="margin:6px 0 0 18px;padding:0;font-size:12px;line-height:1.9;">
            <li>Diagrama de rastreo forzado (<i>Force-Directed Crawl Diagram</i>)</li>
            <li>Diagrama de directorio forzado (<i>Force-Directed Directory Diagram</i>)</li>
            <li>Gráfico de árbol de rastreo (<i>Crawl Tree Graph</i>)</li>
            <li>Gráfico de árbol de directorio (<i>Directory Tree Graph</i>)</li>
            <li>Nube de palabras de página/contenido (<i>Word Cloud</i> — page text)</li>
            <li>Nube de palabras de anclas/enlaces (<i>Word Cloud</i> — link text)</li>
          </ul>
          Estos alimentan la pestaña <b>Enlazado</b> (páginas huérfanas, arquitectura de enlaces).
        </div>
      </div>

      <div class="ym-cl-group">
        <div class="ym-cl-tool">🔍 Search Console — Rendimiento <span class="ym-cl-tag ym-cl-opt">Recomendado</span></div>
        <div class="ym-cl-item">Rendimiento → Resultados de la búsqueda → botón <b>Exportar</b> (arriba a la derecha) → CSV. Esta exportación descarga <b>varios archivos a la vez</b> — añádelos todos al ZIP: Consultas, Páginas, Países, Dispositivos y Apariencia en la búsqueda. Cuanto más rango de fechas mejor (hasta 16 meses).</div>
      </div>

      <div class="ym-cl-group">
        <div class="ym-cl-tool">✅ Search Console — Indexación / Cobertura <span class="ym-cl-tag ym-cl-opt">Recomendado</span></div>
        <div class="ym-cl-item">Indexación → Páginas → botón <b>Exportar</b> → descarga el informe completo: incluye el desglose de motivos por los que una página no se indexa, el mismo desglose para problemas no críticos, y la evolución temporal de páginas indexadas frente a sin indexar. Añade los tres CSV que genera.</div>
      </div>

      <div class="ym-cl-group">
        <div class="ym-cl-tool">⚙️ Search Console — Estadísticas de rastreo <span class="ym-cl-tag ym-cl-opt">Recomendado</span></div>
        <div class="ym-cl-item">Configuración → Estadísticas de rastreo → Abrir informe completo → <b>Exportar</b> (arriba a la derecha) — descarga <b>seis tablas a la vez</b>: tendencia total, por host, por finalidad, por tipo de respuesta, por tipo de archivo y por tipo de robot de Google. Añádelas todas.</div>
      </div>

      <div class="ym-cl-group">
        <div class="ym-cl-tool">🔗 Search Console — Enlaces <span class="ym-cl-tag ym-cl-opt">Opcional</span></div>
        <div class="ym-cl-item">Enlaces → Enlaces externos → Páginas de destino principales / Sitios web con más enlaces → <b>Exportar</b>.</div>
      </div>

      <div class="ym-cl-group">
        <div class="ym-cl-tool">📊 Google Analytics 4 <span class="ym-cl-tag ym-cl-opt">Recomendado</span></div>
        <div class="ym-cl-item">Cada informe se exporta por separado — icono ↗ o ⋮ en la esquina superior de cada tabla → <b>Descargar archivo</b> → CSV. Usa el <b>mismo rango de fechas</b> en todos para que se puedan cruzar correctamente entre sí. Informes que este plugin reconoce:
          <ul style="margin:6px 0 0 18px;padding:0;font-size:12px;line-height:1.9;">
            <li><b>Adquisición de tráfico</b> (grupo de canales de sesión)</li>
            <li><b>Adquisición de usuarios</b> (grupo de canales de usuario)</li>
            <li><b>Páginas y pantallas</b></li>
            <li><b>Eventos</b> (nombre de evento + número de eventos)</li>
            <li><b>Página de destino</b> (landing page + sesiones)</li>
            <li><b>Página de destino con cadena de consulta</b> — informe de tráfico orgánico con parámetros</li>
            <li><b>Cohortes de adquisición / eventos clave</b></li>
            <li><b>Término de búsqueda interna</b> (si usas búsqueda en el sitio)</li>
            <li><b>Generar oportunidades de venta</b> (resumen de leads, si aplica)</li>
          </ul>
        </div>
      </div>

      <div class="ym-cl-group">
        <div class="ym-cl-tool">🖥️ Servidor <span class="ym-cl-tag ym-cl-opt">Muy recomendado</span></div>
        <div class="ym-cl-item">El <b>error_log</b> de PHP de tu hosting (normalmente <span class="ym-mono">/wp-content/debug.log</span> si tienes WP_DEBUG_LOG activo, o descargable desde el panel de tu hosting — cPanel: Métricas → Errores). Cópialo tal cual, sin renombrar ni recortar. Se detecta automáticamente por su formato de fecha al principio de cada línea.</div>
      </div>

      <p style="text-align:center;margin:14px 0 4px;">
        <a href="https://yel-martinez-portfolio.com/wp-content/uploads/guia-preparar-datos-ym-analytics.pdf" target="_blank" rel="noopener" style="color:var(--ym-lime);font-weight:600;text-decoration:none;font-size:12px;">↓ Descargar esta guía en PDF</a>
      </p>

      <div class="ym-modal-btns" style="margin-top:4px">
        <button class="ym-btncancel" onclick="document.getElementById('ymChecklistModal').classList.remove('open')">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
(function(){
'use strict';
function ymLoadChart(cb){if(window.Chart)return cb();var s=document.createElement('script');s.src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js';s.onload=cb;document.head.appendChild(s);}
function ymLoadPDFJS(cb){
  if(window.pdfjsLib)return cb();
  var s=document.createElement('script');
  s.src='https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js';
  s.onload=function(){window.pdfjsLib.GlobalWorkerOptions.workerSrc='https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';cb();};
  document.head.appendChild(s);
}
function ymLoadJSZip(cb){
  if(window.JSZip)return cb();
  var s=document.createElement('script');
  s.src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js';
  s.onload=cb;
  document.head.appendChild(s);
}

const YM_AI_AJAX='__YM_AJAX_URL__';
const YM_AI_NONCE='__YM_AI_NONCE__';
const YM_AI_READY=(__YM_AI_READY__===true);
const YM_AI_LIMIT=__YM_AI_LIMIT__;
const YM={project:'',analyst:'',files:{},fileMeta:{},charts:{},
  annotations:[],
  actions:[],
  history:[],
  trackedKw:[],
  aiChat:[]
};
const ROOT=document.getElementById('ym-analytics-root');
const SLOTS=[
  {k:'sc_queries',l:'Consultas',t:'Search Console'},
  {k:'sc_pages',l:'Páginas',t:'Search Console'},
  {k:'organic_traffic',l:'Tráfico de búsqueda orgánica de Google: Página de destino y cadena de consulta',t:'GA4'},
  {k:'leads',l:'Resumen de Generar oportunidades de venta',t:'GA4'},
  {k:'landing',l:'Página de destino: Página de destino',t:'GA4'},
  {k:'pages',l:'Páginas y pantallas: Ruta de página y clase de pantalla',t:'GA4'},
  {k:'events',l:'Eventos: Nombre del evento',t:'GA4'},
  {k:'traffic_acq',l:'Adquisición de tráfico: Grupo de canales principal de la sesión',t:'GA4'},
  {k:'user_acq',l:'Adquisición de usuarios: Primer grupo de canales principal del usuario',t:'GA4'},
  {k:'errorlog',l:'error_log del servidor',t:'Técnico'},
  {k:'crawl_sf',l:'Rastreo completo (Screaming Frog)',t:'Técnico'},
  {k:'cs_trend',l:'Estadísticas de rastreo: gráfico resumen',t:'Search Console'},
  {k:'cs_responses',l:'Estadísticas de rastreo: tabla de respuestas',t:'Search Console'},
  {k:'cs_filetypes',l:'Estadísticas de rastreo: tipos de archivo',t:'Search Console'},
  {k:'backlinks',l:'Enlaces: páginas de destino principales',t:'Search Console'},
  {k:'coverage_issues',l:'Cobertura: problemas críticos de indexación',t:'Search Console'},
  {k:'coverage_noncritical',l:'Cobertura: problemas no críticos de indexación',t:'Search Console'},
  {k:'coverage_trend',l:'Cobertura: evolución indexadas/sin indexar',t:'Search Console'},
  {k:'accesibilidad',l:'On-page: accesibilidad (WCAG)',t:'Técnico'},
  {k:'contenido',l:'On-page: contenido y duplicados',t:'Técnico'},
  {k:'estructurados',l:'On-page: datos estructurados (JSON-LD)',t:'Técnico'},
  {k:'canonicals',l:'On-page: canonicals y directivas',t:'Técnico'},
  {k:'metas',l:'On-page: meta descriptions',t:'Técnico'},
  {k:'titulos',l:'On-page: títulos de página',t:'Técnico'},
  {k:'h1s',l:'On-page: H1',t:'Técnico'},
  {k:'sf_responses',l:'Rastreo: códigos de respuesta (propio)',t:'Técnico'},
  {k:'pagespeed',l:'Rastreo: PageSpeed / Core Web Vitals',t:'Técnico'},
];
const C=['#b5f23d','#8b5cf6','#38bdf8','#fbbf24','#ff6b6b','#a78bfa','#34d399','#60a5fa','#f472b6','#fb923c'];
const AM={crisis:{l:'🔴 Crisis',c:'ym-pr'},update:{l:'🟡 Update Google',c:'ym-pa'},opp:{l:'🟢 Oportunidad',c:'ym-pl'},note:{l:'🔵 Nota',c:'ym-pv'},goal:{l:'🎯 Objetivo/Visión',c:'ym-pl'},context:{l:'📋 Contexto operativo',c:'ym-pa'}};

window.ymStart=ymStart;window.ymReset=ymReset;window.ymPDF=ymPDF;
window.ymTab=ymTab;window.ymDrop=ymDrop;window.ymHF=ymHF;
window.ymAddAnn=ymAddAnn;window.ymDelAnn=ymDelAnn;window.ymTogAct=ymTogAct;
window.ymSplashDrop=ymSplashDrop;window.ymSplashHF=ymSplashHF;
window.ymTrackKw=ymTrackKw;window.ymTrackKwDirect=ymTrackKwDirect;window.ymUntrackKw=ymUntrackKw;
window.ymAIToggle=ymAIToggle;window.ymAISend=ymAISend;window.ymAINewChat=ymAINewChat;window.ymAIPreview=ymAIPreview;window.ymHostGuide=ymHostGuide;

function ymStart(){
  var pRaw=document.getElementById('ymPN').value.trim();
  if(!pRaw){document.getElementById('ymPN').focus();return;}
  YM.project=esc(pRaw);YM.analyst=esc(document.getElementById('ymAN').value.trim())||'Analista';
  ROOT.querySelector('.ym-splash').style.display='none';
  ROOT.style.position='relative';
  document.getElementById('ymApp').classList.add('on');
  document.getElementById('ymTP').textContent=pRaw;
  ymSL();
  ymLoadChart(function(){ymBuild();ymRenderAnns();});
}
document.getElementById('ymPN').addEventListener('keydown',function(e){if(e.key==='Enter')document.getElementById('ymAN').focus();});
document.getElementById('ymAN').addEventListener('keydown',function(e){if(e.key==='Enter')ymStart();});

// Entrada directa desde la splash: si el usuario suelta el ZIP ya preparado antes de pulsar "Empezar",
// arrancamos la sesión automáticamente (con un nombre de proyecto por defecto si no ha escrito ninguno) y lo procesamos.
function ymSplashHF(files){
  if(!files||!files.length)return;
  var pn=document.getElementById('ymPN');
  if(!pn.value.trim())pn.value=(location.hostname||'').replace(/^www\./,'')||'Mi proyecto';
  ymStart();
  ymHF(files);
}
function ymSplashDrop(e){
  e.preventDefault();
  var dz=document.getElementById('ymSplashDZ');if(dz)dz.classList.remove('drag');
  ymSplashHF(e.dataTransfer.files);
}

function ymReset(){
  Object.values(YM.charts).forEach(function(c){try{c.destroy();}catch(e){}});
  YM.files={};YM.fileMeta={};YM.annotations=[];YM.actions=[];YM.charts={};YM.history=[];YM.trackedKw=[];YM.aiChat=[];
  var zs=document.getElementById('ymZipStatus');if(zs)zs.innerHTML='';
  document.getElementById('ymRM').classList.remove('open');
  document.getElementById('ymApp').classList.remove('on');
  ROOT.querySelector('.ym-splash').style.display='flex';
  document.getElementById('ymPN').value='';document.getElementById('ymAN').value='';
}

function ymDrop(e){e.preventDefault();document.getElementById('ymDZ').classList.remove('drag');ymHF(e.dataTransfer.files);}
function ymHash(s){var h=0;for(var i=0;i<s.length;i++){h=(h<<5)-h+s.charCodeAt(i);h|=0;}return h+'_'+s.length;}
function ymExtractDate(name){var m=String(name).match(/(\d{4})-(\d{2})-(\d{2})/);return m?m[1]+m[2]+m[3]:null;}
// Ingesta unificada de un CSV/errorlog ya leído como texto — usada tanto por drop directo como por ZIP.
// Si ya existe un archivo del mismo tipo detectado, resuelve por contenido idéntico (se ignora) o por fecha en el nombre (se queda con el más reciente).
function ymIngestCSVText(content,filename){
  var t=ymDT(content,filename);
  if(!t){YM.zipStats&&YM.zipStats.unrecognized++;return{status:'unrecognized',type:null};}
  var h=ymHash(content);
  var prev=YM.fileMeta[t];
  if(prev){
    if(prev.hash===h){YM.zipStats&&YM.zipStats.dup++;return{status:'dup',type:t};}
    var nd=ymExtractDate(filename),od=prev.date;
    if(nd&&od&&nd<od){YM.zipStats&&YM.zipStats.oldVersion++;return{status:'older',type:t};}
    YM.zipStats&&(prev.hash!==h)&&YM.zipStats.replaced++;
  }
  if(t==='errorlog'){YM.files[t]={name:filename,raw:content};}
  else{YM.files[t]={name:filename,sections:ymParse(content)};}
  YM.fileMeta[t]={hash:h,date:ymExtractDate(filename),name:filename};
  YM.zipStats&&YM.zipStats.ok++;
  return{status:'ok',type:t};
}
function ymHF(files){
  Array.from(files).forEach(function(f){
    if(/\.zip$/i.test(f.name)||f.type==='application/zip'){ymHandleZip(f);return;}
    if(/\.pdf$/i.test(f.name)||f.type==='application/pdf'){ymReadHistPDF(f);return;}
    var r=new FileReader();
    r.onload=function(ev){ymIngestCSVText(ev.target.result,f.name);ymSL();ymBuild();};
    r.readAsText(f,'UTF-8');
  });
}
function ymHandleZip(file){
  var zs=document.getElementById('ymZipStatus');
  if(zs)zs.innerHTML='Leyendo '+esc(file.name)+'…';
  YM.zipStats={ok:0,dup:0,oldVersion:0,replaced:0,skipped:0,pdfOk:0,pdfSkip:0,unrecognized:0,vizOk:0};
  ymLoadJSZip(function(){
    JSZip.loadAsync(file).then(function(zip){
      var entries=[];
      zip.forEach(function(path,entry){if(!entry.dir)entries.push(entry);});
      // Procesado secuencial (no en paralelo) para que el orden de resolución de versiones sea determinista.
      return entries.reduce(function(chain,entry){
        return chain.then(function(){
          var name=entry.name.split('/').pop();
          if(/\.csv$/i.test(name)||/error_log/i.test(name)){
            return entry.async('string').then(function(content){ymIngestCSVText(content,entry.name);});
          }
          if(/\.pdf$/i.test(name)){
            return entry.async('arraybuffer').then(function(buf){return ymIngestHistPDFBuffer(buf,name);});
          }
          if(/\.html?$/i.test(name)){
            var vizType=ymDetectVizHtml(name);
            if(vizType){
              return entry.async('string').then(function(content){
                YM.files[vizType]={name:entry.name,html:content};
                YM.zipStats.vizOk++;
              });
            }
          }
          YM.zipStats.skipped++;
          return null;
        });
      },Promise.resolve());
    }).then(function(){
      ymSL();ymBuild();ymHistPanel();
      var s=YM.zipStats;
      var parts=[s.ok+' archivos importados'];
      if(s.replaced)parts.push(s.replaced+' actualizados a la versión más reciente');
      if(s.dup)parts.push(s.dup+' duplicados idénticos ignorados');
      if(s.oldVersion)parts.push(s.oldVersion+' versiones antiguas ignoradas');
      if(s.pdfOk)parts.push(s.pdfOk+' PDFs históricos añadidos');
      if(s.vizOk)parts.push(s.vizOk+' diagramas de enlazado capturados (pestaña Enlazado)');
      if(s.skipped)parts.push(s.skipped+' archivos sin formato soportado (html, imágenes…) ignorados');
      if(s.unrecognized)parts.push(s.unrecognized+' CSV con formato no reconocido por YM Analytics (ignorados, no corrompen ningún dato)');
      if(zs)zs.innerHTML=esc(file.name)+': '+parts.join(' · ');
    }).catch(function(err){
      if(zs)zs.innerHTML='<span style="color:var(--ym-coral)">Error leyendo el ZIP: '+esc(String(err))+'</span>';
    });
  });
}
function ymLoadPDFJSP(){return new Promise(function(res){ymLoadPDFJS(res);});}
function ymStripAccents(s){return String(s||'').normalize('NFD').replace(/[\u0300-\u036f]/g,'').toLowerCase();}
function ymDetectVizHtml(filename){
  var n=ymStripAccents(filename);
  var has=function(){return Array.prototype.every.call(arguments,function(w){return n.indexOf(w)>-1;});};
  if(has('diagrama','rastreo','forzado')||has('force-directed','crawl'))return'viz_force_crawl';
  if(has('diagrama','directorio','forzado')||has('force-directed','directory'))return'viz_force_dir';
  if((has('grafico','arbol','rastreo')&&n.indexOf('directorio')===-1)||has('crawl tree graph'))return'viz_tree_crawl';
  if(has('grafico','arbol','directorio')||has('directory tree graph'))return'viz_tree_dir';
  if(has('nube','palabras','pagina')||(has('word cloud')&&n.indexOf('page')>-1))return'viz_wordcloud_content';
  if(has('nube','palabras','ancla')||(has('word cloud')&&n.indexOf('link')>-1))return'viz_wordcloud_anchor';
  return null;
}
// Núcleo compartido: extrae el bloque YM_DATA::...::YMEND de un PDF histórico ya en ArrayBuffer.
// Usado tanto por el drop directo de un único PDF como por los PDFs encontrados dentro de un ZIP.
function ymIngestHistPDFBuffer(buf,filename){
  return ymLoadPDFJSP().then(function(){
    return window.pdfjsLib.getDocument({data:buf}).promise;
  }).then(function(pdf){
    var pagePromises=[];
    for(var i=1;i<=pdf.numPages;i++){
      pagePromises.push(pdf.getPage(i).then(function(page){return page.getTextContent();}).then(function(tc){return tc.items.map(function(it){return it.str;}).join(' ');}));
    }
    return Promise.all(pagePromises);
  }).then(function(pagesText){
    var full=pagesText.join(' ');
    var m=full.match(/YM_DATA::([A-Za-z0-9+/=\s]*?)::YMEND/);
    if(!m){YM.zipStats&&YM.zipStats.pdfSkip++;return{status:'no-data'};}
    var b64=m[1].replace(/\s+/g,'');
    var data=JSON.parse(decodeURIComponent(escape(atob(b64))));
    if(!data||!data.date)throw new Error('formato inesperado');
    data.date=esc(String(data.date));
    if(data.proj)data.proj=esc(String(data.proj));
    if(Array.isArray(data.trackedKw))data.trackedKw.forEach(function(t){if(t&&t.kw)t.kw=esc(String(t.kw));});
    if(!YM.history.find(function(h){return h.date===data.date;})){
      YM.history.push(data);
      YM.history.sort(function(a,b){return a.date<b.date?-1:1;});
    }
    YM.zipStats&&YM.zipStats.pdfOk++;
    return{status:'ok'};
  }).catch(function(err){
    YM.zipStats&&YM.zipStats.pdfSkip++;
    return{status:'error',error:err};
  });
}
function ymReadHistPDF(f){
  var el=document.getElementById('ymHISTSetup');
  var fname=esc(f.name);
  if(el)el.innerHTML='<div class="ym-cs">Leyendo '+fname+'…</div>';
  var r=new FileReader();
  r.onload=function(ev){
    ymIngestHistPDFBuffer(ev.target.result,f.name).then(function(res){
      if(res.status==='ok'){if(el)el.innerHTML='';ymHistPanel();}
      else if(res.status==='no-data'){if(el)el.innerHTML='<div class="ym-alert ym-aa"><span class="ym-ai">🟡</span><div><strong>'+fname+' no contiene datos de YM Analytics</strong>Solo se pueden trazar PDFs exportados desde este mismo dashboard (botón PDF de arriba).</div></div>';}
      else{if(el)el.innerHTML='<div class="ym-alert ym-ar"><span class="ym-ai">🔴</span><div><strong>Error leyendo datos de '+fname+'</strong>'+esc(String(res.error||''))+'</div></div>';}
    });
  };
  r.readAsArrayBuffer(f);
}
function ymDT(c,fn){
  var t=c.toLowerCase(),f=fn.toLowerCase();
  if(/^\[\d{2}-[a-z]{3}-\d{4}/i.test(c.trim())||f.includes('error_log'))return'errorlog';
  if(t.includes('enlaces internos únicos')&&t.includes('indexabilidad')&&t.includes('recuento de palabras'))return'crawl_sf'; // 'recuento de palabras' descarta enlaces_todo.csv, que comparte las otras dos columnas pero no ésta
  if(t.includes('all infracciones'))return'accesibilidad';
  if(t.includes('coincidencia casi duplicada'))return'contenido';
  if(t.includes('funciones de resultados enriquecidos'))return'estructurados';
  if(t.includes('canonical http'))return'canonicals';
  if(t.includes('longitud de la meta description'))return'metas';
  if(t.includes('longitud del título'))return'titulos';
  if(t.includes('longitud de h1-1'))return'h1s';
  if(t.includes('tipo de redirección')&&t.includes('tiempo de respuesta'))return'sf_responses';
  if(t.includes('speed index tiempo'))return'pagespeed';
  if(t.includes('fecha,total de solicitudes de rastreo'))return'cs_trend';
  if(t.includes('host,solicitudes de rastreo'))return'cs_hosts';
  if(t.includes('finalidad,ratio total de solicitudes'))return'cs_purpose';
  if(t.includes('respuesta,ratio total de solicitudes'))return'cs_responses';
  if(t.includes('tipo de archivo,ratio total de solicitudes'))return'cs_filetypes';
  if(t.includes('tipo de robot de google,ratio total de solicitudes'))return'cs_googlebot';
  if(t.includes('enlaces entrantes')&&t.includes('sitios web con enlaces'))return'backlinks';
  if(t.includes('motivo,fuente,validación,páginas')||t.includes('motivo,fuente,validacion,paginas')){
    return(f.includes('no crit'))?'coverage_noncritical':'coverage_issues';
  }
  if((t.includes('indexad')||t.includes('no indexad'))&&t.includes('fecha')&&(t.includes('impresion')||t.includes('sin indexar')))return'coverage_trend';
  if(t.includes('últimos')&&t.includes('anteriores')){
    if(t.includes('consultas principales')||f.includes('consulta'))return'sc_queries';
    if(t.includes('páginas principales'))return'sc_pages';
    if(t.includes('país,')||f.includes('país'))return'sc_countries';
    if(t.includes('dispositivo,')||f.includes('dispositivo'))return'sc_devices';
    return'sc_appearance';
  }
  if(t.includes('cohortes de adquisición'))return'key_events';
  if(t.includes('resumen de generar')||f.includes('resumen_de_generar'))return'leads';
  if(t.includes('consulta de la búsqueda'))return'queries';
  if(t.includes('página de destino')&&t.includes('cadena de consulta'))return'organic_traffic';
  if(t.includes('clientes potenciales'))return'leads';
  if(t.includes('página de destino')&&t.includes('sesiones')&&!t.includes('cadena'))return'landing';
  if(t.includes('título de página')||t.includes('ruta de página'))return'pages';
  if(t.includes('nombre del evento')&&t.includes('número de eventos'))return'events';
  if(t.includes('grupo de canales principal de la sesión'))return'traffic_acq';
  if(t.includes('primer grupo de canales principal del usuario'))return'user_acq';
  return null; // no reconocido — antes cualquier CSV desconocido caía silenciosamente en 'key_events'
}
function ymParse(content){
  var lines=content.split(/\r?\n/),secs=[],i=0;
  while(i<lines.length){
    while(i<lines.length&&(lines[i].startsWith('#')||!lines[i].trim()))i++;
    if(i>=lines.length)break;
    var hdr=ymCL(lines[i]).map(function(h){return h.replace(/"/g,'').replace(/\u00a0/g,' ').trim();});i++;
    var rows=[];
    while(i<lines.length&&lines[i].trim()&&!lines[i].startsWith('#')){
      var v=ymCL(lines[i]);
      if(v.length>=hdr.length-1){var o={};hdr.forEach(function(h,j){o[h]=esc((v[j]||'').replace(/"/g,'').trim());});rows.push(o);}
      i++;
    }
    if(rows.length)secs.push({rows:rows});
  }
  return secs;
}
function ymCL(l){var r=[],c='',q=false;for(var i=0;i<l.length;i++){var ch=l[i];if(ch==='"')q=!q;else if(ch===','&&!q){r.push(c);c='';}else c+=ch;}r.push(c);return r;}
function ymSL(){
  document.getElementById('ymSL').innerHTML=SLOTS.map(function(s){
    var ok=!!YM.files[s.k];
    return'<div class="ym-slot"><div class="ym-sdot '+(ok?'ok':'')+'"></div><div class="ym-sname '+(ok?'ok':'')+'">'
      +s.l+'<br><span style="font-size:8px;color:var(--ym-t3)">'+s.t+'</span></div></div>';
  }).join('');
}

var N=function(v){return parseFloat(String(v||0).replace('%','').replace(',','.'))||0;};
var FMT=function(v){return new Intl.NumberFormat('es').format(Math.round(v));};
var esc=function(v){return String(v==null?'':v).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#39;');};
var CONV_EV=['form_submit','click_phone','click_email','file_download','leads_click','generate_lead','purchase','sign_up','lead_form'];
function gR(t,k){var f=YM.files[t];if(!f)return[];for(var i=0;i<f.sections.length;i++)if(f.sections[i].rows.length&&k in f.sections[i].rows[0])return f.sections[i].rows;return(f.sections[0]||{rows:[]}).rows;}
function gD(t,k){var f=YM.files[t];if(!f)return[[],[]];var s=f.sections.filter(function(x){return x.rows.length;});return[s[0]?s[0].rows:[],s[1]?s[1].rows:[]];}
function gSC(type){
  var f=YM.files[type];
  if(!f||!f.sections.length||!f.sections[0].rows.length)return[];
  var rows=f.sections[0].rows;
  var dimKey=Object.keys(rows[0])[0];
  return rows.map(function(r){
    return{
      name:r[dimKey]||'',
      clicks:N(r['Últimos 28 días Clics']),clicksP:N(r['28 días anteriores Clics']),
      impr:N(r['Últimos 28 días Impresiones']),imprP:N(r['28 días anteriores Impresiones']),
      ctr:N(r['Últimos 28 días CTR']),ctrP:N(r['28 días anteriores CTR']),
      pos:N(r['Últimos 28 días Posición']),posP:N(r['28 días anteriores Posición'])
    };
  });
}
function gPages(){
  var f=YM.files['pages'];
  if(!f||!f.sections.length)return{key:null,rows:[]};
  var rows=f.sections[0].rows;
  if(!rows.length)return{key:null,rows:[]};
  var key=Object.keys(rows[0]).find(function(k){return k.toLowerCase().includes('página')||k.toLowerCase().includes('ruta');})||Object.keys(rows[0])[0];
  return{key:key,rows:rows};
}
function gLeadsBlocks(key){
  var f=YM.files['leads'];
  if(!f)return[[],[]];
  var matches=f.sections.filter(function(s){return s.rows.length&&key in s.rows[0];});
  return[matches[0]?matches[0].rows:[],matches[1]?matches[1].rows:[]];
}
function gRetentionCohort(){
  var f=YM.files['leads'];
  if(!f)return null;
  var s=f.sections.find(function(s){return s.rows.length&&'Fecha' in s.rows[0]&&Object.keys(s.rows[0]).some(function(k){return k.indexOf('Semana')===0;});});
  return s?s.rows:null;
}
function mkC(id,type,data,extra){
  if(YM.charts[id]){try{YM.charts[id].destroy();}catch(e){}}
  var el=ROOT.querySelector('#'+id);if(!el)return;
  extra=extra||{};
  var base={responsive:true,maintainAspectRatio:false,
    plugins:{legend:{labels:{color:'#8892b0',font:{size:10,family:'Inter'},boxWidth:9}}},
    scales:{x:{grid:{color:'rgba(255,255,255,0.04)'},ticks:{color:'#7e8aaf',font:{size:9}}},
            y:{grid:{color:'rgba(255,255,255,0.04)'},ticks:{color:'#7e8aaf',font:{size:9}}}}};
  if(type==='doughnut'||type==='pie')delete base.scales;
  dM(base,extra);
  YM.charts[id]=new Chart(el,{type:type,data:data,options:base});
}
function dM(t,s){Object.keys(s||{}).forEach(function(k){if(s[k]&&typeof s[k]==='object'&&!Array.isArray(s[k])){if(!t[k])t[k]={};dM(t[k],s[k]);}else t[k]=s[k];});return t;}

function ymTab(n,el){
  ROOT.querySelectorAll('.ym-panel').forEach(function(p){p.classList.remove('active');});
  ROOT.querySelectorAll('.ym-ni').forEach(function(i){i.classList.remove('active');});
  var panel=ROOT.querySelector('#ym-'+n);if(panel)panel.classList.add('active');
  if(el)el.classList.add('active');
}

function ymBuild(){
  var loaded=Object.keys(YM.files).length;
  document.getElementById('ymPer').textContent=loaded?(loaded+' fuente'+(loaded>1?'s':'')+' cargada'+(loaded>1?'s':'')+' · período actual vs. anterior según tus CSVs'):'Carga los CSVs para ver el análisis';
  ymKpis();ymCtx();ymAlerts();ymTrend();ymFlow();ymDonut();ymChQual();ymHealthStrip();ymPriorityPanel();
  ymSEO();ymSEOAnalysis();ymOnPagePanel();ymKwWatchRender();ymKwIntelPanel();ymVisibilidadPanel();ymCanales();ymCanalesAnalysis();ymComp();ymCompAnalysis();ymLeads();ymLeadsAnalysis();ymStrategy();ymErrorLog();ymHostGuide();ymCrawlStatsPanel();ymBacklinksPanel();ymCoveragePanel();ymEnlazadoPanel();ymScreamingFrog();ymDiagnoseRender();ymAIInit();ymHistPanel();ymBuildActions();ymRenderActions();ymRoadmapPanel();
}

function ymComputeKpis(){
  var TK='Grupo de canales principal de la sesión (Grupo de canales predeterminado)';
  var UK='Primer grupo de canales principal del usuario (Grupo de canales predeterminado)';
  var dT=gD('traffic_acq',TK),tc=dT[0],tp=dT[1];
  var dU=gD('user_acq',UK),uc=dU[0],up=dU[1];
  var sess=tc.reduce(function(a,r){return a+N(r['Sesiones']);},0);
  var sessp=tp.reduce(function(a,r){return a+N(r['Sesiones']);},0);
  var newU=uc.reduce(function(a,r){return a+N(r['Usuarios nuevos']);},0);
  var newUp=up.reduce(function(a,r){return a+N(r['Usuarios nuevos']);},0);
  var eng=tc.reduce(function(a,r){return a+N(r['Sesiones con interacción']);},0);
  var er=sess>0?(eng/sess*100).toFixed(1):0;
  var erp=sessp>0?(tp.reduce(function(a,r){return a+N(r['Sesiones con interacción']);},0)/sessp*100).toFixed(1):0;
  var qb=gLeadsBlocks('Clientes potenciales cualificados'),qCur=qb[0],qPrev=qb[1];
  var hasLeadData,leadsC,leadsP;
  if(qCur.length){
    hasLeadData=true;
    leadsC=qCur.reduce(function(a,r){return a+N(r['Clientes potenciales cualificados']);},0);
    leadsP=qPrev.reduce(function(a,r){return a+N(r['Clientes potenciales cualificados']);},0);
  }else{
    var dEv=gD('events','Nombre del evento'),evc=dEv[0],evp=dEv[1];
    hasLeadData=evc.length>0;
    leadsC=evc.filter(function(r){return CONV_EV.indexOf((r['Nombre del evento']||'').toLowerCase())>-1;}).reduce(function(a,r){return a+N(r['Número de eventos']);},0);
    leadsP=evp.filter(function(r){return CONV_EV.indexOf((r['Nombre del evento']||'').toLowerCase())>-1;}).reduce(function(a,r){return a+N(r['Número de eventos']);},0);
  }
  return{sess:sess,sessp:sessp,newU:newU,newUp:newUp,er:er,erp:erp,leadsC:leadsC,leadsP:leadsP,hasLeadData:hasLeadData};
}
function ymKpis(){
  var k=ymComputeKpis();
  function d(c,p,s){s=s||'';if(!p)return'<span class="ym-fl">–</span>';var v=((c-p)/p*100).toFixed(1);return'<span class="'+(v>0?'ym-up':'ym-dn')+'">'+(v>0?'▲':'▼')+' '+Math.abs(v)+'%'+s+'</span>';}
  document.getElementById('ymKP').innerHTML=
    '<div class="ym-kcard ym-lime"><div class="ym-klbl">Sesiones</div><div class="ym-kval">'+FMT(k.sess)+'</div><div class="ym-kdelta">'+d(k.sess,k.sessp)+' vs anterior</div></div>'+
    '<div class="ym-kcard ym-violet"><div class="ym-klbl">Usuarios nuevos</div><div class="ym-kval">'+FMT(k.newU)+'</div><div class="ym-kdelta">'+d(k.newU,k.newUp)+' vs anterior</div></div>'+
    '<div class="ym-kcard ym-sky"><div class="ym-klbl">Tasa interacción</div><div class="ym-kval">'+k.er+'<span style="font-size:15px">%</span></div><div class="ym-kdelta">'+d(k.er,k.erp,' pp')+'</div></div>'+
    '<div class="ym-kcard ym-coral"><div class="ym-klbl">Leads (ev. clave)</div><div class="ym-kval">'+(k.hasLeadData?FMT(k.leadsC):'–')+'</div><div class="ym-kdelta">'+(k.hasLeadData?d(k.leadsC,k.leadsP)+' vs anterior':'Sube el CSV de Eventos')+'</div></div>';
}

function ymCtx(){
  var a=YM.annotations.filter(function(x){return x.type==='crisis'||x.type==='update';});
  document.getElementById('ymCTX').innerHTML=a.length?
    '<div class="ym-ctx"><div class="ym-ctx-ic">⚠️</div><div><h3>Contexto activo que afecta los datos</h3><p>'+
    a.map(function(x){return'<strong>'+x.date+':</strong> '+x.text;}).join('<br><br>')+'</p></div></div>':'';
}

function ymComputeAlerts(){
  var out=[];
  var TK='Grupo de canales principal de la sesión (Grupo de canales predeterminado)';
  var dT=gD('traffic_acq',TK),tc=dT[0];
  if(tc.length){
    var totalS=tc.reduce(function(a,r){return a+N(r['Sesiones']);},0);
    var top=[].concat(tc).sort(function(a,b){return N(b['Sesiones'])-N(a['Sesiones']);})[0];
    if(top&&totalS>0){
      var share=(N(top['Sesiones'])/totalS*100).toFixed(1);
      var rate=(N(top['Porcentaje de interacciones'])*100).toFixed(1);
      out.push({level:'good',icon:'🟢',title:(top[TK]||'')+': '+share+'% sesiones, '+rate+'% interacción',text:'Canal principal por volumen de sesiones en este período.'});
    }
  }
  var dEv=gD('events','Nombre del evento'),evc=dEv[0],evp=dEv[1];
  if(evc.length&&evp.length){
    evc.forEach(function(r){
      var name=r['Nombre del evento'],cur=N(r['Número de eventos']);
      var pv=evp.find(function(p){return p['Nombre del evento']===name;});
      var prev=pv?N(pv['Número de eventos']):null;
      if(prev&&prev>0){
        var delta=(cur-prev)/prev*100;
        if(cur===0)out.push({level:'critical',icon:'🔴',title:name+' = 0 (era '+prev+')',text:'Este evento ha dejado de registrarse. Verifica la implementación en GA4/GTM.'});
        else if(delta<=-40)out.push({level:'warning',icon:'🟡',title:name+' '+delta.toFixed(1)+'% ('+cur+' vs '+prev+')',text:'Caída relevante respecto al período anterior.'});
      }
    });
  }
  var pageRows=ymGetPageRows();
  if(pageRows.length){
    var op=[].concat(pageRows).filter(function(r){return r.impr>500;}).sort(function(a,b){return a.ctrPct-b.ctrPct;})[0];
    if(op)out.push({level:'warning',icon:'🟡',title:(op.name||'').substring(0,40)+': '+FMT(op.impr)+' impr, CTR '+op.ctrPct.toFixed(2)+'% → oportunidad',text:'Mejorar título y meta descripción puede generar clics adicionales.'});
  }
  return out;
}
function ymAlerts(){
  var alerts=ymComputeAlerts();
  document.getElementById('ymAL').innerHTML=alerts.length?alerts.map(function(a){
    var cls=a.level==='critical'?'ym-ar':a.level==='warning'?'ym-aa':a.level==='good'?'ym-al':'ym-av';
    return'<div class="ym-alert '+cls+'"><span class="ym-ai">'+a.icon+'</span><div><strong>'+a.title+'</strong>'+a.text+'</div></div>';
  }).join(''):'<div class="ym-alert ym-av"><span class="ym-ai">ℹ️</span><div><strong>Sin datos suficientes</strong>Sube tus CSVs de GA4/Search Console para generar alertas automáticas a partir de tus propios datos.</div></div>';
}

function ymTrend(){
  var wrap=document.getElementById('ymTRWrap');
  var rows=gRetentionCohort();
  if(YM.charts['ymTR']){try{YM.charts['ymTR'].destroy();}catch(e){}delete YM.charts['ymTR'];}
  if(!rows||!rows.length){
    wrap.innerHTML='<div style="display:flex;align-items:center;justify-content:center;height:100%;color:var(--ym-t3);font-size:12px;text-align:center;padding:0 12px">Sube el informe "Generar oportunidades de venta" de GA4 para ver la retención por cohortes.</div>';
    return;
  }
  var cols=Object.keys(rows[0]);
  wrap.innerHTML='<div style="overflow-y:auto;height:100%"><table class="ym-dt"><thead><tr>'+cols.map(function(c){return'<th>'+c+'</th>';}).join('')+'</tr></thead><tbody>'+
    rows.map(function(r){return'<tr>'+cols.map(function(c,i){return i===0?'<td><span class="ym-mono" style="font-size:9px">'+(r[c]||'')+'</span></td>':'<td>'+(r[c]!==undefined&&r[c]!==''?r[c]:'<span class="ym-fl">–</span>')+'</td>';}).join('')+'</tr>';}).join('')+
  '</tbody></table></div>';
}

function ymFlow(){
  var TK='Grupo de canales principal de la sesión (Grupo de canales predeterminado)';
  var tc=gD('traffic_acq',TK)[0];
  var el=document.getElementById('ymFL');
  if(!tc.length){
    el.innerHTML='<div style="color:var(--ym-t3);font-size:12px;text-align:center;width:100%;padding:0 12px">Sube el CSV de Adquisición de tráfico para ver el flujo de canales.</div>';
    return;
  }
  var CM={'Organic Search':'#b5f23d','Direct':'#8b5cf6','Referral':'#38bdf8','Unassigned':'#fbbf24','Organic Social':'#ff6b6b','AI Assistant':'#a78bfa'};
  var ch=tc.map(function(r){return{n:r[TK]||'',s:N(r['Sesiones']),l:N(r['Eventos clave']),c:CM[r[TK]]||'#8892b0'};});
  var mxS=Math.max.apply(null,ch.map(function(x){return x.s;}))||1;
  var mxL=Math.max.apply(null,ch.map(function(x){return x.l;}))||1;
  document.getElementById('ymFL').innerHTML='<div style="width:100%;padding:4px 0">'+
    '<div class="ym-flow-lbl"><span>← Sesiones</span><span>Leads →</span><span style="width:34px;text-align:right">Conv.</span></div>'+
    ch.map(function(x){
      var wS=Math.max(8,x.s/mxS*100),wL=x.l>0?Math.max(8,x.l/mxL*100):0,cv=(x.s>0?(x.l/x.s*100).toFixed(1):0);
      return'<div class="ym-flow-row">'+
        '<div class="ym-flow-name">'+x.n+'</div>'+
        '<div class="ym-flow-bar"><div class="ym-flow-fill" style="width:'+wS+'%;background:'+x.c+'"></div><div class="ym-flow-barlbl">'+FMT(x.s)+'</div></div>'+
        '<div style="font-size:8px;color:var(--ym-t3)">→</div>'+
        '<div class="ym-flow-leads">'+(wL>0?'<div class="ym-flow-lfill" style="width:'+wL+'%"></div>':'')+
        '<div class="ym-flow-llbl">'+x.l+'</div></div>'+
        '<div class="ym-flow-conv" style="color:'+(cv>1?'var(--ym-lime)':cv>0?'var(--ym-amber)':'var(--ym-t3)')+'">'+cv+'%</div>'+
      '</div>';
    }).join('')+'</div>';
}

function ymDonut(){
  var TK='Grupo de canales principal de la sesión (Grupo de canales predeterminado)';
  var tc=gD('traffic_acq',TK)[0];
  mkC('ymDN','doughnut',{
    labels:tc.map(function(r){return r[TK]||'';}),
    datasets:[{data:tc.map(function(r){return N(r['Sesiones']);}),backgroundColor:C,borderWidth:0,hoverOffset:5}]
  },{plugins:{legend:{position:'right',labels:{font:{size:10},padding:9}}}});
}

function ymChQual(){
  var TK='Grupo de canales principal de la sesión (Grupo de canales predeterminado)';
  var dT=gD('traffic_acq',TK),tc=dT[0],tp=dT[1];
  var CM={'Organic Search':'#b5f23d','Direct':'#8b5cf6','Referral':'#38bdf8','Unassigned':'#fbbf24','Organic Social':'#ff6b6b','AI Assistant':'#a78bfa'};
  document.getElementById('ymCQ').innerHTML=tc.map(function(r){
    var ch=r[TK]||'',rt=(N(r['Porcentaje de interacciones'])*100).toFixed(0);
    var pv=tp.find(function(p){return p[TK]===ch;}),rp=pv?(N(pv['Porcentaje de interacciones'])*100).toFixed(0):null;
    var col=CM[ch]||'#8892b0';
    return'<div class="ym-chbar"><div class="ym-chtop"><span style="font-weight:700;color:var(--ym-text)">'+ch+'</span>'+
      '<div style="display:flex;gap:7px;font-size:10px"><span style="color:'+col+';font-weight:700">'+rt+'%</span>'+(rp!==null?'<span style="color:var(--ym-t3)">'+rp+'% ant.</span>':'')+'</div></div>'+
      '<div class="ym-chtrack"><div class="ym-chfill" style="width:'+rt+'%;background:'+col+'"></div></div></div>';
  }).join('');
}

function ymGetQRows(){
  var QC='Consulta de la Búsqueda de Google orgánica',CL='Clics de la Búsqueda de Google orgánica',
      IM='Impresiones de la Búsqueda de Google orgánica',CT='Porcentaje de clics de la Búsqueda de Google orgánica',
      PS='Posición media en la Búsqueda de Google orgánica';
  var scQ=gSC('sc_queries');
  var legacyQ=gD('queries',QC),qcLegacy=legacyQ[0],qpLegacy=legacyQ[1];
  return scQ.length?scQ.map(function(r){return{name:r.name,clicks:r.clicks,clicksP:r.clicksP,impr:r.impr,ctrPct:r.ctr,pos:r.pos};})
    :qcLegacy.map(function(r){var q=r[QC];var pv=qpLegacy.find(function(p){return p[QC]===q;});return{name:q,clicks:N(r[CL]),clicksP:pv?N(pv[CL]):null,impr:N(r[IM]),ctrPct:N(r[CT])*100,pos:N(r[PS])};});
}
function ymGetPageRows(){
  var IM='Impresiones de la Búsqueda de Google orgánica',CL='Clics de la Búsqueda de Google orgánica',
      CT='Porcentaje de clics de la Búsqueda de Google orgánica',PS='Posición media en la Búsqueda de Google orgánica',
      PG='Página de destino y cadena de consulta';
  var oc=gD('organic_traffic',PG)[0];
  var scP=gSC('sc_pages');
  return oc.length?oc.map(function(r){return{name:r[PG],impr:N(r[IM]),clicks:N(r[CL]),ctrPct:N(r[CT])*100,pos:N(r[PS])};})
    :scP.map(function(r){return{name:r.name,impr:r.impr,clicks:r.clicks,ctrPct:r.ctr,pos:r.pos};});
}
function ymSEO(){
  var qRows=ymGetQRows();
  var pageRows=ymGetPageRows();
  var tCl=qRows.reduce(function(a,r){return a+r.clicks;},0);
  var tClP=qRows.reduce(function(a,r){return a+(r.clicksP||0);},0);
  var tIm=pageRows.reduce(function(a,r){return a+r.impr;},0);
  var avgCTR=tIm>0?(tCl/tIm*100).toFixed(2):0;
  var ops0=[].concat(pageRows).filter(function(r){return r.impr>200;}).sort(function(a,b){return a.ctrPct-b.ctrPct;})[0];
  var topQ=[].concat(qRows).sort(function(a,b){return b.impr-a.impr;})[0];
  document.getElementById('ymSC').innerHTML=[
    {l:'Clics orgánicos',v:FMT(tCl),s:'prev. '+FMT(tClP),c:'var(--ym-lime)'},
    {l:'Impresiones',v:FMT(tIm),s:'período actual',c:'var(--ym-sky)'},
    {l:'CTR medio',v:avgCTR+'%',s:'potencial 2–5%',c:'var(--ym-amber)'},
  ].concat(ops0?[{l:'Mejor oportunidad CTR',v:(ops0.name||'').substring(0,26),s:FMT(ops0.impr)+' imp · '+ops0.ctrPct.toFixed(2)+'% CTR',c:'var(--ym-violet-text)'}]:[])
   .concat(topQ?[{l:'Consulta con más impresiones',v:topQ.name||'',s:FMT(topQ.impr)+' imp · pos. '+topQ.pos.toFixed(1),c:'var(--ym-coral)'}]:[])
   .map(function(x){return'<div class="ym-ichip"><strong style="color:'+x.c+'">'+x.l+'</strong>'+x.v+'<br><span style="color:var(--ym-t3);font-size:9px">'+x.s+'</span></div>';}).join('')
   ||'<div class="ym-ichip">Sube tus CSVs de Search Console (Consultas/Páginas) o el tráfico orgánico de GA4 para ver oportunidades SEO.</div>';
  var top8=[].concat(qRows).sort(function(a,b){return b.clicks-a.clicks;}).slice(0,8);
  mkC('ymSK','bar',{
    labels:top8.map(function(r){return(r.name||'').substring(0,15);}),
    datasets:[
      {label:'Actual',data:top8.map(function(r){return r.clicks;}),backgroundColor:'#b5f23d',borderRadius:3},
      {label:'Anterior',data:top8.map(function(r){return r.clicksP||0;}),backgroundColor:'rgba(139,92,246,.6)',borderRadius:3}
    ]
  },{indexAxis:'y',scales:{x:{ticks:{color:'#7e8aaf'}},y:{ticks:{color:'#8892b0',font:{size:9}}}}});
  var scD=pageRows.slice(0,12).map(function(r){return{x:r.impr,y:r.ctrPct,r:Math.max(4,Math.min(16,r.clicks/2+4)),lb:(r.name||'').substring(0,20)};});
  mkC('ymSS','bubble',{datasets:[{data:scD.map(function(d){return{x:d.x,y:d.y,r:d.r};}),backgroundColor:'rgba(56,189,248,.55)',borderColor:'#38bdf8',borderWidth:1}]},{plugins:{legend:{display:false},tooltip:{callbacks:{label:function(ctx){var d=scD[ctx.dataIndex];return d.lb+': '+FMT(d.x)+' imp · '+d.y.toFixed(2)+'% CTR';}}}},scales:{x:{title:{display:true,text:'Impr.',color:'#7e8aaf'},ticks:{color:'#7e8aaf'}},y:{title:{display:true,text:'CTR %',color:'#7e8aaf'},ticks:{color:'#7e8aaf'}}}});
  document.getElementById('ymQT').innerHTML=!top8.length?'<div class="ym-cs">Sube el CSV de Consultas (Search Console) para ver esta tabla.</div>':'<table class="ym-dt"><thead><tr><th>Consulta</th><th>Clics</th><th>Δ</th><th>Impr.</th><th>CTR</th><th>Pos.</th></tr></thead><tbody>'+
    top8.map(function(r){var delta=(r.clicksP===null||r.clicksP===undefined)?null:r.clicks-r.clicksP;var pc=r.pos<=3?'ym-pca':r.pos<=10?'ym-pcb':'ym-pcc';
    return'<tr><td><span class="ym-mono">'+r.name+'</span></td><td><strong>'+r.clicks+'</strong></td><td>'+(delta===null?'<span class="ym-fl">sin comparativa</span>':delta===0?'<span class="ym-fl">–</span>':'<span class="'+(delta>0?'ym-up':'ym-dn')+'">'+(delta>0?'+':'')+delta+'</span>')+'</td><td>'+FMT(r.impr)+'</td><td>'+r.ctrPct.toFixed(2)+'%</td><td><span class="'+pc+'">'+r.pos.toFixed(1)+'</span></td></tr>';
    }).join('')+'</tbody></table>';
  ymUrlDiagnosticsPanel();
}

function ymChannelDiag(sess,rate,avgRate,ke,krate){
  if(sess<5)return'Volumen insuficiente para sacar conclusiones fiables todavía.';
  if(ke===0&&sess>=20)return'Volumen alto, 0 conversiones — revisa si el tracking capta este canal o si el mensaje de la página de destino no encaja con quien llega por aquí.';
  if(rate<avgRate-10)return'Interacción muy por debajo de tu media general — posible tráfico de baja calidad o desajuste con la landing.';
  if(rate>avgRate+10&&krate>0.5)return'Tu canal de mejor calidad relativa — si tienes presupuesto que repartir, aquí rendiría más.';
  if(rate<avgRate-10&&sess>=20)return'Revisa el origen exacto del tráfico de este canal (¿bots, referidos de baja calidad?).';
  return'Sin señal de alerta relevante en este canal.';
}
function ymCanales(){
  var TK='Grupo de canales principal de la sesión (Grupo de canales predeterminado)';
  var UK='Primer grupo de canales principal del usuario (Grupo de canales predeterminado)';
  var dT=gD('traffic_acq',TK),tc=dT[0],tp=dT[1];
  var dU=gD('user_acq',UK),uc=dU[0],up=dU[1];
  var chs=tc.map(function(r){return r[TK]||'';});
  mkC('ymSB','bar',{labels:chs,datasets:[{label:'Actual',data:tc.map(function(r){return N(r['Sesiones']);}),backgroundColor:'#b5f23d',borderRadius:3},{label:'Anterior',data:chs.map(function(ch){var m=tp.find(function(r){return r[TK]===ch;});return m?N(m['Sesiones']):0;}),backgroundColor:'rgba(139,92,246,.6)',borderRadius:3}]});
  var uchs=uc.map(function(r){return r[UK]||'';});
  mkC('ymUB','bar',{labels:uchs,datasets:[{label:'Actual',data:uc.map(function(r){return N(r['Usuarios nuevos']);}),backgroundColor:'#38bdf8',borderRadius:3},{label:'Anterior',data:uchs.map(function(ch){var m=up.find(function(r){return r[UK]===ch;});return m?N(m['Usuarios nuevos']):0;}),backgroundColor:'rgba(56,189,248,.4)',borderRadius:3}]});
  var totalSAll=tc.reduce(function(a,r){return a+N(r['Sesiones']);},0);
  var totalEngAll=tc.reduce(function(a,r){return a+N(r['Sesiones con interacción']);},0);
  var avgRateAll=totalSAll?totalEngAll/totalSAll*100:0;
  document.getElementById('ymCD').innerHTML=!tc.length?'<div class="ym-cs">Sube el CSV de Adquisición de tráfico para ver esta tabla.</div>':'<table class="ym-dt"><thead><tr><th>Canal</th><th>Sesiones</th><th>Interacción</th><th>Tasa</th><th>Tiempo</th><th>Ev/ses</th><th>Leads</th><th>Conv.</th><th>Qué hacer</th></tr></thead><tbody>'+
    tc.map(function(r){var ch=r[TK]||'',sess=N(r['Sesiones']),eng=N(r['Sesiones con interacción']),rate=(N(r['Porcentaje de interacciones'])*100),time=N(r['Tiempo de interacción medio por sesión']).toFixed(0),evps=N(r['Eventos por sesión']).toFixed(1),ke=N(r['Eventos clave']),krate=(N(r['Tasa de evento clave de sesión'])*100);var rc=rate>50?'var(--ym-lime)':rate>30?'var(--ym-amber)':'var(--ym-coral)';var diag=ymChannelDiag(sess,rate,avgRateAll,ke,krate);
    return'<tr><td><strong>'+ch+'</strong></td><td>'+FMT(sess)+'</td><td>'+FMT(eng)+'</td><td style="color:'+rc+';font-weight:700">'+rate.toFixed(1)+'%</td><td>'+time+'s</td><td>'+evps+'</td><td>'+ke+'</td><td style="color:'+(krate>0.5?'var(--ym-lime)':'var(--ym-t3)')+'">'+krate.toFixed(2)+'%</td><td style="font-size:9px;color:var(--ym-t2);max-width:200px">'+diag+'</td></tr>';
    }).join('')+'</tbody></table>';
}

function ymPageDiag(views,time,avgViews,avgTime,ke,isHub){
  if(ke>0)return'Genera conversión — mantenla actualizada y bien enlazada.';
  if(isHub)return'Página hub/índice — es normal que retenga menos que tus páginas de contenido; no la compares contra esa media.';
  if(views>avgViews*1.5&&time<avgTime*0.5)return'Mucho tráfico pero poca retención — revisa velocidad de carga y que el contenido cumpla lo prometido en el título.';
  if(time>avgTime*1.3&&ke===0)return'Retiene bien pero no convierte — añade una llamada a la acción clara.';
  if(views<avgViews*0.3)return'Tráfico bajo — candidata a reforzar con enlazado interno o promoción.';
  return'Sin problema evidente.';
}
function ymIsHubPage(path){
  path=(path||'').replace(/^https?:\/\/[^\/]+/,'');
  return path===''||path==='/'||/\/(blog|recursos|servicios|herramientas|categoria|category|tag|page|pagina)\/?$/i.test(path);
}
function ymComp(){
  var ev=gR('events','Nombre del evento'),ld=gR('landing','Página de destino');
  var pgInfo=gPages(),pg=pgInfo.rows,PGK=pgInfo.key;
  var hmD=ld.slice(0,10).map(function(r){return{x:N(r['Sesiones']),y:N(r['Tasa de evento clave de sesión'])*100,r:Math.max(5,Math.min(20,N(r['Tiempo de interacción medio por sesión'])/5+4)),lb:(r['Página de destino']||'').replace(/\//g,'').substring(0,16)||'home'};});
  mkC('ymHM','bubble',{datasets:[{data:hmD.map(function(d){return{x:d.x,y:d.y,r:d.r};}),backgroundColor:hmD.map(function(_,i){return C[i%10]+'aa';}),borderColor:hmD.map(function(_,i){return C[i%10];}),borderWidth:1.5}]},{plugins:{legend:{display:false},tooltip:{callbacks:{label:function(ctx){var d=hmD[ctx.dataIndex];return['📄 '+d.lb,'Ses:'+d.x+' Conv:'+d.y.toFixed(2)+'%'];}}}},scales:{x:{title:{display:true,text:'Sesiones',color:'#7e8aaf'},ticks:{color:'#7e8aaf'}},y:{title:{display:true,text:'Conv %',color:'#7e8aaf'},ticks:{color:'#7e8aaf'}}}});
  var t10=ev.slice(0,10);
  mkC('ymEV','bar',{labels:t10.map(function(r){return(r['Nombre del evento']||'').substring(0,13);}),datasets:[{data:t10.map(function(r){return N(r['Número de eventos']);}),backgroundColor:t10.map(function(_,i){return C[i%10];}),borderRadius:3}]},{plugins:{legend:{display:false}},indexAxis:'y',scales:{x:{ticks:{color:'#7e8aaf'}},y:{ticks:{color:'#8892b0',font:{size:9}}}}});
  var contentPagesC=pg.filter(function(r){return!ymIsHubPage(PGK?r[PGK]:'');});
  var avgViews=contentPagesC.length?contentPagesC.reduce(function(a,r){return a+N(r['Vistas']);},0)/contentPagesC.length:0;
  var avgTimeC=contentPagesC.length?contentPagesC.reduce(function(a,r){return a+N(r['Tiempo de interacción medio por usuario activo']);},0)/contentPagesC.length:0;
  var CAP=40;
  var pgSorted=[].concat(pg).sort(function(a,b){return N(b['Vistas'])-N(a['Vistas']);});
  var pgShow=pgSorted.slice(0,CAP);
  var pgNote=pgSorted.length>CAP?('<div class="ym-cs" style="margin-bottom:6px">Mostrando '+CAP+' de '+pgSorted.length+' páginas, ordenadas por vistas.</div>'):'';
  document.getElementById('ymPG').innerHTML=!PGK?'<div class="ym-cs">Sube el CSV de Páginas y pantallas para ver esta tabla.</div>':pgNote+'<table class="ym-dt"><thead><tr><th>Página</th><th>Vistas</th><th>Usuarios</th><th>Tiempo</th><th>Leads</th><th>Qué hacer</th></tr></thead><tbody>'+
    pgShow.map(function(r){var views=N(r['Vistas']),time=N(r['Tiempo de interacción medio por usuario activo']),ke=N(r['Eventos clave']);var isHub=ymIsHubPage(PGK?r[PGK]:'');var diag=ymPageDiag(views,time,avgViews,avgTimeC,ke,isHub);
      return'<tr><td style="max-width:170px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-size:10px">'+(r[PGK]||'')+(isHub?' <span class="ym-pill ym-pv" style="font-size:7px">HUB</span>':'')+'</td><td>'+FMT(views)+'</td><td>'+FMT(N(r['Usuarios activos']))+'</td><td>'+time.toFixed(0)+'s</td><td style="color:'+(ke>0?'var(--ym-lime)':'var(--ym-t3)')+'">'+ke+'</td><td style="font-size:9px;color:var(--ym-t2)">'+diag+'</td></tr>';}).join('')+'</tbody></table>';
  var t8l=ld.slice(0,8);
  mkC('ymLD','bubble',{datasets:[{data:t8l.map(function(r){return{x:N(r['Sesiones']),y:N(r['Tiempo de interacción medio por sesión']),r:Math.max(5,Math.min(18,N(r['Eventos clave'])*4+5))};}),backgroundColor:t8l.map(function(_,i){return C[i%10]+'99';}),borderColor:t8l.map(function(_,i){return C[i%10];}),borderWidth:1.5}]},{plugins:{legend:{display:false},tooltip:{callbacks:{label:function(ctx){var d=t8l[ctx.dataIndex];return[(d['Página de destino']||'').substring(0,24),ctx.parsed.x+' ses · '+ctx.parsed.y.toFixed(0)+'s'];}}}},scales:{x:{title:{display:true,text:'Sesiones',color:'#7e8aaf'},ticks:{color:'#7e8aaf'}},y:{title:{display:true,text:'Tiempo (s)',color:'#7e8aaf'},ticks:{color:'#7e8aaf'}}}});
}

function ymLeads(){
  function deltaHtml(c,p){if(p===null)return'<span class="ym-fl">sin comparativa</span>';if(p===0)return c>0?'<span class="ym-up">▲ NUEVO</span>':'<span class="ym-fl">–</span>';var v=((c-p)/p*100).toFixed(1);return'<span class="'+(v>0?'ym-up':'ym-dn')+'">'+(v>0?'▲':'▼')+' '+Math.abs(v)+'%</span>';}
  var qb=gLeadsBlocks('Clientes potenciales cualificados'),qCur=qb[0],qPrev=qb[1];
  var cb=gLeadsBlocks('Clientes potenciales convertidos'),cCur=cb[0],cPrev=cb[1];
  var officialCards='';
  if(qCur.length){
    var qTot=qCur.reduce(function(a,r){return a+N(r['Clientes potenciales cualificados']);},0);
    var qTotP=qPrev.reduce(function(a,r){return a+N(r['Clientes potenciales cualificados']);},0);
    var cTot=cCur.reduce(function(a,r){return a+N(r['Clientes potenciales convertidos']);},0);
    var cTotP=cPrev.reduce(function(a,r){return a+N(r['Clientes potenciales convertidos']);},0);
    officialCards=
      '<div class="ym-kcard ym-violet"><div class="ym-klbl">Clientes potenciales cualificados</div><div class="ym-kval">'+FMT(qTot)+'</div><div class="ym-kdelta">'+deltaHtml(qTot,qTotP)+' vs anterior</div></div>'+
      '<div class="ym-kcard ym-lime"><div class="ym-klbl">Clientes potenciales convertidos</div><div class="ym-kval">'+FMT(cTot)+'</div><div class="ym-kdelta">'+deltaHtml(cTot,cTotP)+' vs anterior</div></div>';
  }
  var dEv=gD('events','Nombre del evento'),evc=dEv[0],evp=dEv[1];
  var conv=evc.filter(function(r){return CONV_EV.indexOf((r['Nombre del evento']||'').toLowerCase())>-1;});
  function prevOf(name){var pv=evp.find(function(p){return p['Nombre del evento']===name;});return pv?N(pv['Número de eventos']):null;}
  if(!conv.length&&!qCur.length){
    document.getElementById('ymLK').innerHTML='<div class="ym-ichip">Sube el CSV de Eventos, o el informe de Generar oportunidades de venta, para ver el análisis de leads.</div>';
    if(YM.charts['ymLB']){try{YM.charts['ymLB'].destroy();}catch(e){}delete YM.charts['ymLB'];}
  }else{
    var evHtml='';
    if(conv.length){
      var totalC=conv.reduce(function(a,r){return a+N(r['Número de eventos']);},0);
      var totalPRows=evp.filter(function(r){return CONV_EV.indexOf((r['Nombre del evento']||'').toLowerCase())>-1;});
      var totalP=totalPRows.length?totalPRows.reduce(function(a,r){return a+N(r['Número de eventos']);},0):null;
      var top3=[].concat(conv).sort(function(a,b){return N(b['Número de eventos'])-N(a['Número de eventos']);}).slice(0,qCur.length?2:3);
      var colors=['ym-coral','ym-sky','ym-lime'];
      evHtml=(qCur.length?'':'<div class="ym-kcard ym-violet"><div class="ym-klbl">Total leads (ev. clave)</div><div class="ym-kval">'+FMT(totalC)+'</div><div class="ym-kdelta">'+deltaHtml(totalC,totalP)+' vs anterior</div></div>')+
        top3.map(function(r,i){var name=r['Nombre del evento'],cur=N(r['Número de eventos']),prev=prevOf(name);
          return'<div class="ym-kcard '+colors[i]+'"><div class="ym-klbl">'+name+'</div><div class="ym-kval">'+FMT(cur)+'</div><div class="ym-kdelta">'+deltaHtml(cur,prev)+'</div></div>';}).join('');
      mkC('ymLB','bar',{labels:conv.map(function(r){return r['Nombre del evento'];}),datasets:[
        {label:'Actual',data:conv.map(function(r){return N(r['Número de eventos']);}),backgroundColor:'#b5f23d',borderRadius:3},
        {label:'Anterior',data:conv.map(function(r){var p=prevOf(r['Nombre del evento']);return p||0;}),backgroundColor:'rgba(139,92,246,.6)',borderRadius:3}
      ]},{plugins:{legend:{display:evp.length>0}}});
    }else{
      if(YM.charts['ymLB']){try{YM.charts['ymLB'].destroy();}catch(e){}delete YM.charts['ymLB'];}
      var lbEl=document.getElementById('ymLB');
      if(lbEl&&lbEl.parentElement)lbEl.parentElement.innerHTML='<div class="ym-cs">No hay eventos marcados como clave en el periodo. Revisa en GA4 → Administrar eventos que el evento de conversión (compra, formulario, contacto...) esté marcado como \u201cevento clave\u201d, o que el CSV de Eventos incluya el rango de fechas correcto.</div>';
    }
    document.getElementById('ymLK').innerHTML=officialCards+evHtml;
  }
  var TK='Grupo de canales principal de la sesión (Grupo de canales predeterminado)';
  var tcCh=gD('traffic_acq',TK)[0];
  if(tcCh.length){
    var lsAllZero=tcCh.every(function(r){return N(r['Eventos clave'])===0;});
    mkC('ymLS','bar',{labels:tcCh.map(function(r){return r[TK]||'';}),datasets:[{label:'Eventos clave',data:tcCh.map(function(r){return N(r['Eventos clave']);}),backgroundColor:'#38bdf8',borderRadius:3}]},{plugins:{legend:{display:false}}});
    var lsEl=document.getElementById('ymLS');
    if(lsEl){
      var lsNote=lsEl.parentElement?lsEl.parentElement.querySelector('.ym-ls-note'):null;
      if(lsNote)lsNote.remove();
      if(lsAllZero&&lsEl.parentElement)lsEl.parentElement.insertAdjacentHTML('beforeend','<div class="ym-cs ym-ls-note" style="margin-top:6px">Todos los canales muestran 0 eventos clave. Revisa que el evento de conversi\u00f3n est\u00e9 bien configurado en GA4 y que el periodo analizado tenga actividad real.</div>');
    }
  }else if(YM.charts['ymLS']){try{YM.charts['ymLS'].destroy();}catch(e){}delete YM.charts['ymLS'];}
  var ld=gR('landing','Página de destino');
  if(ld.length){
    var crawlMap={};
    ymCrawlHtmlRows().forEach(function(r){crawlMap[(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'')]=r;});
    function leadPageDiag(sess,ke,path){
      if(ke>0)return'Convierte — mantenla como referencia de qué funciona.';
      if(sess<10)return'Volumen bajo — todavía sin muestra suficiente.';
      var cr=crawlMap[path];
      if(cr){
        var words=N(cr['Recuento de palabras']);
        if(words>0&&words<300)return FMT(sess)+' sesiones sin conversión y contenido escaso ('+words+' palabras) — amplíalo.';
      }
      var convChP=ymDeclaredConvChannel();
      return convChP?(FMT(sess)+' sesiones sin "evento clave" — si aquí conviertes por '+convChP+', confirma que ese enlace esté visible y medido con un evento de GA4.'):(FMT(sess)+' sesiones sin ninguna conversión — revisa visualmente el CTA/formulario, o añade en Anotaciones cuál es tu canal de conversión real.');
    }
    var CAP=40;
    var ldSorted=[].concat(ld).sort(function(a,b){return N(b['Sesiones'])-N(a['Sesiones']);});
    var ldShow=ldSorted.slice(0,CAP);
    var ldNote=ldSorted.length>CAP?('<div class="ym-cs" style="margin-bottom:6px">Mostrando '+CAP+' de '+ldSorted.length+' páginas de destino.</div>'):'';
    document.getElementById('ymLD2').innerHTML='<div class="ym-ct" style="margin-bottom:8px">Leads por página de destino (todas)</div>'+ldNote+'<table class="ym-dt"><thead><tr><th>Página</th><th>Sesiones</th><th>Ev. clave</th><th>Tasa</th><th>Qué hacer</th></tr></thead><tbody>'+
      ldShow.map(function(r){var path=(r['Página de destino']||'').replace(/^https?:\/\/[^\/]+/,'');var sess=N(r['Sesiones']),ke=N(r['Eventos clave']);
        return'<tr><td><span class="ym-mono" style="font-size:10px">'+path.substring(0,34)+'</span></td><td>'+FMT(sess)+'</td><td><strong>'+ke+'</strong></td><td>'+(N(r['Tasa de evento clave de sesión'])*100).toFixed(1)+'%</td><td style="font-size:9px;color:var(--ym-t2)">'+leadPageDiag(sess,ke,path)+'</td></tr>';}).join('')+'</tbody></table>';
  }else{
    document.getElementById('ymLD2').innerHTML='<div class="ym-cs">Sube el CSV de Páginas de destino para ver el desglose de leads por página.</div>';
  }
}

function pearson(xs,ys){
  var n=xs.length;if(n<3)return null;
  var mx=xs.reduce(function(a,b){return a+b;},0)/n,my=ys.reduce(function(a,b){return a+b;},0)/n;
  var num=0,dx2=0,dy2=0;
  for(var i=0;i<n;i++){var dx=xs[i]-mx,dy=ys[i]-my;num+=dx*dy;dx2+=dx*dx;dy2+=dy*dy;}
  var den=Math.sqrt(dx2*dy2);
  return den===0?null:num/den;
}
function ymStrategy(){
  var qRows=ymGetQRows(),pageRows=ymGetPageRows();
  var k=ymComputeKpis();
  // 1. Zona de impacto (striking distance): pos 4-15, impresiones altas
  var sdz=[].concat(qRows).filter(function(r){return r.pos>=4&&r.pos<=15&&r.impr>=50;}).sort(function(a,b){return b.impr-a.impr;}).slice(0,8);
  document.getElementById('ymSDZ').innerHTML=!sdz.length?'<div class="ym-cs">Sin consultas en posición 4-15 con volumen suficiente todavía (o falta subir Consultas de Search Console).</div>':
    '<table class="ym-dt"><thead><tr><th>Consulta</th><th>Pos.</th><th>Impr.</th><th>CTR</th><th>Potencial</th><th>Qué hacer</th></tr></thead><tbody>'+
    sdz.map(function(r){var pot=Math.round(r.impr*0.08);var act=r.pos<=7?'Refuerza enlazado interno + actualiza fecha/datos':'Amplía profundidad de contenido + 2-3 enlaces internos';return'<tr><td><span class="ym-mono">'+r.name+'</span></td><td><span class="ym-pcb">'+r.pos.toFixed(1)+'</span></td><td>'+FMT(r.impr)+'</td><td>'+r.ctrPct.toFixed(2)+'%</td><td style="color:var(--ym-lime);font-weight:700">+'+FMT(pot)+' clics</td><td style="font-size:9px;color:var(--ym-t2)">'+act+'</td></tr>';}).join('')+'</tbody></table>';
  // 2. Curva CTR real por rango de posición (bucketing sobre sus propias consultas)
  var buckets=[{l:'1-3',min:1,max:3},{l:'4-6',min:4,max:6},{l:'7-10',min:7,max:10},{l:'11-20',min:11,max:20},{l:'20+',min:20.01,max:9999}];
  var allRows=qRows.length?qRows:pageRows;
  var curve=buckets.map(function(b){
    var inb=allRows.filter(function(r){return r.pos>=b.min&&r.pos<=b.max;});
    var avgCtr=inb.length?inb.reduce(function(a,r){return a+r.ctrPct;},0)/inb.length:null;
    return{label:b.label||b.l,avg:avgCtr,n:inb.length};
  });
  mkC('ymCTRC','bar',{labels:curve.map(function(c){return c.l+' ('+c.n+')';}),datasets:[{label:'CTR medio real',data:curve.map(function(c){return c.avg||0;}),backgroundColor:'#38bdf8',borderRadius:3}]},{plugins:{legend:{display:false}},scales:{y:{ticks:{color:'#7e8aaf',callback:function(v){return v+'%';}}}}});
  // Consultas por debajo de su propia curva
  var under=allRows.map(function(r){
    var b=buckets.find(function(bb){return r.pos>=bb.min&&r.pos<=bb.max;});
    var bc=curve.find(function(c){return c.l===(b?b.l:null);});
    return{r:r,bAvg:bc?bc.avg:null};
  }).filter(function(x){return x.bAvg!==null&&x.r.ctrPct<x.bAvg*0.6&&x.r.impr>50;}).sort(function(a,b){return a.r.ctrPct-b.r.ctrPct;}).slice(0,6);
  document.getElementById('ymCTRU').innerHTML=!under.length?'<div class="ym-cs">Ninguna consulta/página está significativamente por debajo de su rango de posición (necesita más volumen de datos para calcularlo con fiabilidad).</div>':
    '<table class="ym-dt"><thead><tr><th>Consulta/Página</th><th>Pos.</th><th>CTR real</th><th>CTR medio en su rango</th><th>Déficit</th><th>Qué hacer</th></tr></thead><tbody>'+
    under.map(function(x){return'<tr><td><span class="ym-mono">'+(x.r.name||'').substring(0,34)+'</span></td><td>'+x.r.pos.toFixed(1)+'</td><td style="color:var(--ym-coral)">'+x.r.ctrPct.toFixed(2)+'%</td><td>'+x.bAvg.toFixed(2)+'%</td><td class="ym-dn">-'+(x.bAvg-x.r.ctrPct).toFixed(2)+'pp</td><td style="font-size:9px;color:var(--ym-t2)">Reescribe title/meta con la keyword en los primeros 60 caracteres + un beneficio concreto</td></tr>';}).join('')+'</tbody></table>';
  // 3. Significancia del cambio (proxy sin serie temporal diaria): combina magnitud % + volumen mínimo
  var sigChecks=[
    {name:'Sesiones',cur:k.sess,prev:k.sessp},
    {name:'Usuarios nuevos',cur:k.newU,prev:k.newUp},
    {name:'Leads',cur:k.hasLeadData?k.leadsC:null,prev:k.hasLeadData?k.leadsP:null},
  ];
  var sigHtml=sigChecks.filter(function(s){return s.prev!==null&&s.prev>0;}).map(function(s){
    var delta=(s.cur-s.prev)/s.prev*100;
    var minVolume=s.prev>=30; // umbral mínimo para considerar la variación % fiable y no ruido de muestra pequeña
    var real=minVolume&&Math.abs(delta)>=15;
    var label=!minVolume?'Volumen insuficiente para concluir':(real?'Cambio real probable':'Dentro del ruido normal');
    var cls=!minVolume?'ym-fl':(real?(delta>0?'ym-up':'ym-dn'):'ym-fl');
    return'<div class="ym-alert '+(real?(delta>0?'ym-al':'ym-aa'):'ym-av')+'"><span class="ym-ai">'+(real?(delta>0?'🟢':'🟡'):'⚪')+'</span><div><strong>'+s.name+': '+(delta>0?'+':'')+delta.toFixed(1)+'%</strong><span class="'+cls+'">'+label+'</span> · base anterior: '+FMT(s.prev)+'</div></div>';
  }).join('');
  document.getElementById('ymSIG').innerHTML=sigHtml||'<div class="ym-cs">Necesitas al menos un período anterior con volumen (≥30) para evaluar significancia.</div>';
  // 4. Correlación entre métricas (Pearson) sobre consultas/páginas
  var corrRows=allRows.filter(function(r){return r.impr>0;});
  var corrHtml='';
  if(corrRows.length>=5){
    var rPosCtr=pearson(corrRows.map(function(r){return r.pos;}),corrRows.map(function(r){return r.ctrPct;}));
    var rImprClicks=pearson(corrRows.map(function(r){return r.impr;}),corrRows.map(function(r){return r.clicks;}));
    function interp(r){if(r===null)return'sin datos suficientes';var a=Math.abs(r);var strength=a>=0.7?'fuerte':a>=0.4?'moderada':'débil';return strength+' '+(r>0?'positiva':'negativa')+' (r='+r.toFixed(2)+')';}
    corrHtml='<div class="ym-ichip"><strong style="color:var(--ym-sky)">Posición ↔ CTR</strong>'+interp(rPosCtr)+'<br><span style="color:var(--ym-t3);font-size:9px">Negativa fuerte = a mejor posición, más CTR (lo esperable)</span></div>'+
    '<div class="ym-ichip"><strong style="color:var(--ym-lime)">Impresiones ↔ Clics</strong>'+interp(rImprClicks)+'<br><span style="color:var(--ym-t3);font-size:9px">n='+corrRows.length+' consultas/páginas con impresiones</span></div>';
  }
  document.getElementById('ymCORR').innerHTML=corrHtml||'<div class="ym-ichip">Necesitas al menos 5 consultas/páginas con impresiones para calcular correlaciones fiables.</div>';
  // 5. Pareto 80/20
  var sortedByClicks=[].concat(qRows).filter(function(r){return r.clicks>0;}).sort(function(a,b){return b.clicks-a.clicks;});
  var totalClicksP=sortedByClicks.reduce(function(a,r){return a+r.clicks;},0);
  var cum=0,n80=0;
  for(var i=0;i<sortedByClicks.length;i++){cum+=sortedByClicks[i].clicks;n80=i+1;if(cum>=totalClicksP*0.8)break;}
  var pct80=sortedByClicks.length?((n80/sortedByClicks.length)*100).toFixed(0):0;
  var cumData=[],run=0;
  sortedByClicks.forEach(function(r){run+=r.clicks;cumData.push(totalClicksP?run/totalClicksP*100:0);});
  mkC('ymPAR','line',{labels:sortedByClicks.map(function(_,i){return(i+1)+'';}),datasets:[{label:'% acumulado de clics',data:cumData,borderColor:'#b5f23d',backgroundColor:'rgba(181,242,61,.08)',fill:true,tension:.3,pointRadius:2}]},{plugins:{legend:{display:false}},scales:{y:{max:100,ticks:{color:'#7e8aaf',callback:function(v){return v+'%';}}}}});
  var paretoNote=sortedByClicks.length>=5?('<div class="ym-cs" style="margin-top:8px"><strong style="color:var(--ym-lime)">'+pct80+'% de tus consultas</strong> generan el 80% de los clics ('+n80+' de '+sortedByClicks.length+').</div>')
    :sortedByClicks.length?('<div class="ym-cs" style="margin-top:8px">Solo tienes '+sortedByClicks.length+' consulta(s) con clics todavía — con tan pocos datos el Pareto no es informativo (por eso puede salir 100%). Vuelve a mirarlo cuando tengas al menos 5-10 consultas con clics reales.</div>'):'';
  document.getElementById('ymPARNote').innerHTML=paretoNote;
  // 6. Tráfico desde asistentes IA
  var TK='Grupo de canales principal de la sesión (Grupo de canales predeterminado)';
  var dT=gD('traffic_acq',TK),tc=dT[0],tp=dT[1];
  var aiPat=/ai|chatgpt|perplexity|copilot|gemini|claude/i;
  var aiCur=tc.filter(function(r){return aiPat.test(r[TK]||'');});
  var aiPrev=tp.filter(function(r){return aiPat.test(r[TK]||'');});
  var aiSess=aiCur.reduce(function(a,r){return a+N(r['Sesiones']);},0);
  var aiSessP=aiPrev.reduce(function(a,r){return a+N(r['Sesiones']);},0);
  var totalSess=tc.reduce(function(a,r){return a+N(r['Sesiones']);},0);
  document.getElementById('ymAIT').innerHTML=!tc.length?'<div class="ym-cs">Sube Adquisición de tráfico para ver este canal.</div>':
    '<div class="ym-kcard ym-violet"><div class="ym-klbl">Sesiones desde IA</div><div class="ym-kval">'+FMT(aiSess)+'</div><div class="ym-kdelta">'+(aiSessP?('vs '+FMT(aiSessP)+' anterior'):(aiSess>0?'<span class="ym-up">▲ NUEVO canal</span>':'sin tráfico aún'))+'</div></div>'+
    '<div class="ym-cs" style="margin-top:8px">'+(totalSess?((aiSess/totalSess*100).toFixed(2)+'% de tus sesiones totales vienen de asistentes IA.'):'')+' Es un canal emergente — vale la pena vigilar su evolución período a período, ya que hoy en día la mayoría de estos asistentes citan fuentes con contenido bien estructurado y actualizado.</div>';
  // 7. Canibalización (proxy): páginas con nombres/paths muy similares
  function slugWords(s){return(s||'').toLowerCase().replace(/https?:\/\/[^\/]+/,'').split(/[\/\-_?=&.]+/).filter(function(w){return w.length>3;});}
  var candidates=pageRows.filter(function(r){return r.name&&r.name!=='/'&&r.name!=='(not set)';});
  var pairs=[];
  for(var i=0;i<candidates.length;i++){
    for(var j=i+1;j<candidates.length;j++){
      var w1=slugWords(candidates[i].name),w2=slugWords(candidates[j].name);
      if(!w1.length||!w2.length)continue;
      var shared=w1.filter(function(w){return w2.indexOf(w)>-1;});
      var ratio=shared.length/Math.min(w1.length,w2.length);
      if(ratio>=0.5&&shared.length>=2)pairs.push({a:candidates[i],b:candidates[j],ratio:ratio});
    }
  }
  pairs.sort(function(a,b){return b.ratio-a.ratio;});
  document.getElementById('ymCAN').innerHTML=!pairs.length?'<div class="ym-cs">No se detectan pares de páginas con solapamiento léxico relevante en las URLs (con los datos actuales). Recuerda: esto no sustituye un análisis real query+página vía API de Search Console.</div>':
    '<table class="ym-dt"><thead><tr><th>Página A</th><th>Página B</th><th>Solapamiento</th><th>Qué hacer</th></tr></thead><tbody>'+
    pairs.slice(0,6).map(function(p){var act=p.ratio>=0.7?'Alto solapamiento: valora fusionar ambas en una sola página más completa':'Diferencia claramente el enfoque/keyword de cada una, o enlaza una desde la otra como contenido relacionado';return'<tr><td><span class="ym-mono" style="font-size:9px">'+(p.a.name||'').substring(0,30)+'</span></td><td><span class="ym-mono" style="font-size:9px">'+(p.b.name||'').substring(0,30)+'</span></td><td>'+(p.ratio*100).toFixed(0)+'%</td><td style="font-size:9px;color:var(--ym-t2)">'+act+'</td></tr>';}).join('')+'</tbody></table>';
}
function ymParseErrorLog(){
  var f=YM.files['errorlog'];
  if(!f||!f.raw)return null;
  var lines=f.raw.split(/\r?\n/).filter(function(l){return l.indexOf('Fatal error')>-1||l.indexOf('PHP Warning')>-1;});
  var counts={},pluginCounts={},pluginFatal={},pluginLastDate={};
  lines.forEach(function(l){
    var m=l.match(/PHP (Fatal error|Warning):\s*(.+?)(?:\s+in\s+\/|$)/);
    if(!m)return;
    var msg=esc(m[2].replace(/\{.*$/,'').replace(/:\s*\d+$/,'').trim().substring(0,90));
    var key=(m[1]+': '+msg);
    counts[key]=(counts[key]||0)+1;
    var dateM=l.match(/\[(\d{2}-[A-Za-z]{3}-\d{4})/);
    var lineDate=dateM?dateM[1]:null;
    var pathM=l.match(/\/wp-content\/(plugins|themes)\/([a-zA-Z0-9_-]+)\//);
    var pluginKey=pathM?((pathM[1]==='plugins'?'Plugin: ':'Tema: ')+pathM[2]):'Núcleo de WordPress / sin ruta identificable';
    pluginCounts[pluginKey]=(pluginCounts[pluginKey]||0)+1;
    if(m[1]==='Fatal error')pluginFatal[pluginKey]=(pluginFatal[pluginKey]||0)+1;
    if(lineDate){
      var prev=pluginLastDate[pluginKey];
      if(!prev||new Date(lineDate)>new Date(prev))pluginLastDate[pluginKey]=lineDate;
    }
  });
  var totalFatal=lines.filter(function(l){return l.indexOf('Fatal error')>-1;}).length;
  var totalWarn=lines.length-totalFatal;
  var lastLine=lines[lines.length-1]||'';
  var lastDateM=lastLine.match(/\[(\d{2}-[A-Za-z]{3}-\d{4})/);
  return{counts:counts,pluginCounts:pluginCounts,pluginFatal:pluginFatal,pluginLastDate:pluginLastDate,totalFatal:totalFatal,totalWarn:totalWarn,total:lines.length,lastDate:lastDateM?lastDateM[1]:null};
}
function ymErrLogAction(key){
  if(/Allowed memory size/.test(key))return'Sube el memory_limit de PHP e identifica qué proceso consume tanta memoria.';
  if(/Array to string conversion/.test(key))return'Revisa el código señalado — se está tratando un array como texto (típico de un plugin/tema desactualizado). Actualízalo o repórtalo a soporte del plugin.';
  if(/Uncaught Exception/.test(key))return'Excepción no capturada: revisa el bloque try/catch alrededor de esa función, probablemente de un plugin o integración de terceros.';
  if(/Undefined array key/.test(key))return'Aviso de compatibilidad con PHP moderno — no suele romper nada, pero indica un plugin/tema sin actualizar a la versión de PHP de tu hosting.';
  if(/headers already sent/.test(key))return'Algo genera output antes de las cabeceras HTTP (típico de un fichero con espacio en blanco antes de <?php). Revisa el fichero indicado en el log completo.';
  if(/Unable to load dynamic library/.test(key))return'Falta una extensión de PHP en el servidor (xsl.so). Actívala desde el panel de tu hosting o pide a soporte que la instale.';
  if(/read property.*on null/.test(key))return'Se intenta leer una propiedad de un objeto que no existe — probable conflicto entre plugins o un post/página borrado que aún se referencia.';
  return'Revisa este error con tu hosting o el desarrollador del plugin/tema implicado.';
}
function ymErrorLog(){
  var el=document.getElementById('ymERR');
  var parsed=ymParseErrorLog();
  if(!parsed){el.innerHTML='<div class="ym-cs">Sube el error_log de tu servidor (WordPress lo guarda normalmente en /wp-content/debug.log o en la raíz como error_log) para ver este análisis.</div>';return;}
  var top=Object.keys(parsed.counts).map(function(k){return{k:k,n:parsed.counts[k]};}).sort(function(a,b){return b.n-a.n;}).slice(0,8);
  var byPlugin=Object.keys(parsed.pluginCounts).map(function(k){return{k:k,n:parsed.pluginCounts[k],fatal:parsed.pluginFatal[k]||0,last:parsed.pluginLastDate[k]||null};}).sort(function(a,b){return b.n-a.n;});
  var topPlugin=byPlugin[0];
  var topPluginPct=topPlugin&&parsed.total?(topPlugin.n/parsed.total*100):0;
  var isRecent=topPlugin&&topPlugin.last&&((new Date()-new Date(topPlugin.last))/(1000*60*60*24)<=14);
  var verdict='';
  if(topPlugin&&topPluginPct>=40&&topPlugin.k.indexOf('Núcleo')===-1){
    var ctxTextEL=ymPatientContext().allText;
    var pluginNameLcEL=topPlugin.k.toLowerCase();
    var ctxMentionsLogEL=/\b(log|error_log|error)\b/.test(ctxTextEL);
    var ctxOverlapEL=ctxMentionsLogEL&&(ctxTextEL.indexOf(pluginNameLcEL)>-1||/antes de|ya (se|est[aá]|fue)|resuelto|solucionado|arregl|corrupt|borr[ea]/.test(ctxTextEL));
    var ctxNoteEL=ctxOverlapEL?' ⚠️ Tienes una anotación de contexto operativo que parece hablar de esto mismo — revísala en la pestaña Anotaciones antes de actuar.':'';
    var isRecentSafe=isRecent&&!ctxOverlapEL;
    verdict='<div class="ym-alert '+(isRecentSafe?'ym-ar':'ym-aa')+'" style="margin-bottom:12px"><span class="ym-ai">'+(isRecentSafe?'🔴':'🟡')+'</span><div><strong>'+topPlugin.k+' aparece en el '+topPluginPct.toFixed(0)+'% de las líneas de tu log</strong> ('+FMT(topPlugin.n)+' líneas, '+FMT(topPlugin.fatal)+' fatales). Esto es frecuencia de aparición, no prueba de que el plugin en sí esté roto — puede ser la causa, o puede ser donde otro problema (p.ej. datos corruptos de una página) termina fallando. '+(topPlugin.last?('Última vez registrada: <strong>'+topPlugin.last+'</strong>'+(isRecentSafe?' — localiza el mensaje exacto y el post/ID implicado antes de tocar el plugin.':' — si ya pasaron semanas/meses desde entonces y ya no tienes el plugin activo, esto es arrastre histórico del log, no un problema actual.')):'')+ctxNoteEL+'</div></div>';
  }
  el.innerHTML=verdict+
    '<div class="ym-kgrid" style="margin-bottom:12px"><div class="ym-kcard ym-coral"><div class="ym-klbl">Errores fatales</div><div class="ym-kval">'+FMT(parsed.totalFatal)+'</div><div class="ym-kdelta">'+(parsed.totalFatal>100?'<span class="ym-dn">Volumen alto</span>':'<span class="ym-fl">Volumen moderado</span>')+'</div></div>'+
    '<div class="ym-kcard ym-amber"><div class="ym-klbl">Avisos (Warnings)</div><div class="ym-kval">'+FMT(parsed.totalWarn)+'</div><div class="ym-kdelta">'+(parsed.lastDate?'Último registro: '+parsed.lastDate:'')+'</div></div></div>'+
    (byPlugin.length?'<div class="ym-ct" style="margin-bottom:6px;font-size:11px">Por plugin/tema responsable</div><table class="ym-dt" style="margin-bottom:14px"><thead><tr><th>Origen</th><th>Líneas</th><th>Fatales</th><th>% del log</th><th>Última vez</th></tr></thead><tbody>'+
      byPlugin.slice(0,15).map(function(x){var pct=parsed.total?(x.n/parsed.total*100):0;var recent=x.last&&((new Date()-new Date(x.last))/(1000*60*60*24)<=14);return'<tr><td><span class="ym-mono" style="font-size:9px">'+x.k+'</span></td><td>'+FMT(x.n)+'</td><td style="color:'+(x.fatal>0?'var(--ym-coral)':'var(--ym-t3)')+'">'+FMT(x.fatal)+'</td><td>'+pct.toFixed(1)+'%</td><td style="color:'+(recent?'var(--ym-coral)':'var(--ym-t3)')+'">'+(x.last||'—')+(recent?' (reciente)':'')+'</td></tr>';}).join('')+'</tbody></table>':'')+
    (top.length?'<div class="ym-ct" style="margin-bottom:6px;font-size:11px">Por tipo de mensaje</div><table class="ym-dt"><thead><tr><th>Tipo</th><th>Veces</th><th>Qué hacer</th></tr></thead><tbody>'+
      top.map(function(x){return'<tr><td><span class="ym-mono" style="font-size:9px">'+x.k+'</span></td><td><strong style="color:'+(x.n>1000?'var(--ym-coral)':'var(--ym-amber)')+'">'+FMT(x.n)+'</strong></td><td style="font-size:9px;color:var(--ym-t2)">'+ymErrLogAction(x.k)+'</td></tr>';}).join('')+'</tbody></table>'
      :'<div class="ym-cs">No se detectaron errores fatales ni avisos en el log.</div>');
}
function ymCrawlStatsPanel(){
  var trend=(YM.files['cs_trend']||{sections:[]}).sections[0];
  var trendRows=trend?trend.rows:[];
  if(trendRows.length){
    mkC('ymCST','line',{
      labels:trendRows.map(function(r){return r['Fecha'];}),
      datasets:[
        {label:'Solicitudes',data:trendRows.map(function(r){return N(r['Total de solicitudes de rastreo']);}),borderColor:'#b5f23d',backgroundColor:'rgba(181,242,61,.08)',fill:true,tension:.3,pointRadius:0,yAxisID:'y'},
      ]
    },{scales:{y:{ticks:{color:'#7e8aaf'}}}});
  }else if(YM.charts['ymCST']){try{YM.charts['ymCST'].destroy();}catch(e){}}
  var ft=(YM.files['cs_filetypes']||{sections:[]}).sections[0];
  var ftRows=ft?ft.rows:[];
  if(ftRows.length){
    mkC('ymCSF','doughnut',{labels:ftRows.map(function(r){return r['Tipo de archivo'];}),datasets:[{data:ftRows.map(function(r){return N(r['Ratio total de solicitudes'].toString().replace(',','.'))*100;}),backgroundColor:C}]},{plugins:{legend:{position:'bottom',labels:{color:'#8892b0',font:{size:9},boxWidth:8}}}});
    var htmlPct=ftRows.find(function(r){return r['Tipo de archivo']==='HTML';});
    var cssPct=ftRows.find(function(r){return r['Tipo de archivo']==='CSS';});
    var jsPct=ftRows.find(function(r){return r['Tipo de archivo']==='JavaScript';});
    var assetsPct=(cssPct?N(cssPct['Ratio total de solicitudes'].toString().replace(',','.')):0)+(jsPct?N(jsPct['Ratio total de solicitudes'].toString().replace(',','.')):0);
    var htmlPctVal=htmlPct?N(htmlPct['Ratio total de solicitudes'].toString().replace(',','.'))*100:null;
    document.getElementById('ymCSFNote').innerHTML=assetsPct>0.5?
      '<div class="ym-cs" style="margin-top:8px;color:var(--ym-amber)">⚠️ El '+(assetsPct*100).toFixed(0)+'% de las visitas de Googlebot van a CSS/JS'+(htmlPctVal!==null?(', solo el '+htmlPctVal.toFixed(0)+'% a HTML'):'')+'. Vale la pena revisar caché de assets estáticos para liberar presupuesto de rastreo hacia contenido real.</div>'
      :(htmlPctVal!==null?'<div class="ym-cs" style="margin-top:8px">'+htmlPctVal.toFixed(0)+'% del rastreo va a páginas HTML — reparto razonable.</div>':'');
  }else{if(YM.charts['ymCSF']){try{YM.charts['ymCSF'].destroy();}catch(e){}}document.getElementById('ymCSFNote').innerHTML='';}
  var resp=(YM.files['cs_responses']||{sections:[]}).sections[0];
  var respRows=resp?resp.rows:[];
  var sfRowsAll=(YM.files['crawl_sf']&&YM.files['crawl_sf'].sections.length)?YM.files['crawl_sf'].sections[0].rows:[];
  var brokenUrls=sfRowsAll.filter(function(r){return(r['Código de respuesta']||'')==='404';}).map(function(r){return(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'');});
  document.getElementById('ymCSR').innerHTML=!respRows.length?'<div class="ym-cs">Sube la Tabla de respuestas de Estadísticas de rastreo (Search Console) para ver este desglose.</div>':
    '<table class="ym-dt"><thead><tr><th>Respuesta</th><th>% del rastreo</th><th>Qué hacer</th></tr></thead><tbody>'+
    respRows.map(function(r){var pct=N(r['Ratio total de solicitudes'].toString().replace(',','.'))*100;var bad=/404|500|503|Error/.test(r['Respuesta']);var action='—';
      if(/404/.test(r['Respuesta'])&&pct>1)action=brokenUrls.length?('Redirige (301) estas URLs de tu rastreo: '+brokenUrls.slice(0,3).join(', ')+(brokenUrls.length>3?'…':'')):'Sube el rastreo de Screaming Frog para ver las URLs exactas.';
      else if(/5\d\d/.test(r['Respuesta'])&&pct>0.5)action='Códigos 5xx indican fallo del servidor, no de la página — cruza con tu error_log para la fecha.';
      else if(bad)action='Revisa el motivo de este código con tu hosting.';
      return'<tr><td>'+r['Respuesta']+'</td><td style="color:'+(bad?'var(--ym-coral)':'var(--ym-text)')+'">'+pct.toFixed(2)+'%</td><td style="font-size:9px;color:var(--ym-t2)">'+action+'</td></tr>';}).join('')+'</tbody></table>';
}
function ymBacklinksPanel(){
  var rows=gR('backlinks','Página de destino');
  var el=document.getElementById('ymBKL');
  if(!rows.length){el.innerHTML='<div class="ym-cs">Sube el CSV "Páginas de destino principales" del informe de Enlaces de Search Console.</div>';return;}
  var top=[].concat(rows).sort(function(a,b){return N(b['Enlaces entrantes'])-N(a['Enlaces entrantes']);}).slice(0,15);
  el.innerHTML='<table class="ym-dt"><thead><tr><th>Página</th><th>Enlaces entrantes</th><th>Sitios</th></tr></thead><tbody>'+
    top.map(function(r){return'<tr><td><span class="ym-mono" style="font-size:9px">'+(r['Página de destino']||'').replace(/^https?:\/\/[^\/]+/,'').substring(0,36)+'</span></td><td><strong>'+FMT(N(r['Enlaces entrantes']))+'</strong></td><td>'+N(r['Sitios web con enlaces'])+'</td></tr>';}).join('')+'</tbody></table>';
}
function ymCoveragePanel(){
  var trend=(YM.files['coverage_trend']||{sections:[]}).sections[0];
  var trendRows=trend?trend.rows:[];
  var elChart=document.getElementById('ymCOVT'),elTbl=document.getElementById('ymCOVI');
  if(!elChart||!elTbl)return;
  if(trendRows.length){
    mkC('ymCOVT','line',{
      labels:trendRows.map(function(r){return r['Fecha'];}),
      datasets:[
        {label:'Indexadas',data:trendRows.map(function(r){return N(r['Indexadas']);}),borderColor:'#b5f23d',backgroundColor:'rgba(181,242,61,.25)',fill:true,tension:.25,pointRadius:0},
        {label:'Sin indexar',data:trendRows.map(function(r){return N(r['Sin indexar']);}),borderColor:'#ff6b6b',backgroundColor:'rgba(255,107,107,.25)',fill:true,tension:.25,pointRadius:0}
      ]
    },{scales:{y:{stacked:true,ticks:{color:'#7e8aaf'}},x:{stacked:true}}});
  }else if(YM.charts['ymCOVT']){try{YM.charts['ymCOVT'].destroy();}catch(e){}}
  var critFile=YM.files['coverage_issues'],nonCritFile=YM.files['coverage_noncritical'];
  var critRows=critFile&&critFile.sections.length?critFile.sections[0].rows:[];
  var nonCritRows=nonCritFile&&nonCritFile.sections.length?nonCritFile.sections[0].rows:[];
  if(!critRows.length&&!nonCritRows.length){
    elTbl.innerHTML='<div class="ym-cs">Sube el export de Indexación → Páginas de Search Console (Cobertura) para ver este desglose.</div>';
    return;
  }
  function rowsHtml(rows,sev){
    return[].concat(rows).sort(function(a,b){return N(b['Páginas'])-N(a['Páginas']);}).map(function(r){
      return'<tr><td>'+(r['Motivo']||'')+'</td><td style="color:'+(sev==='critical'?'var(--ym-coral)':'var(--ym-amber)')+'"><strong>'+FMT(N(r['Páginas']))+'</strong></td><td style="font-size:9px;color:var(--ym-t3)">'+(r['Fuente']||'')+'</td></tr>';
    }).join('');
  }
  elTbl.innerHTML='<table class="ym-dt"><thead><tr><th>Motivo</th><th>Páginas</th><th>Fuente</th></tr></thead><tbody>'+
    rowsHtml(critRows,'critical')+rowsHtml(nonCritRows,'warning')+'</tbody></table>';
}
function ymOnPagePanel(){
  var el=document.getElementById('ymOPTitles');
  if(!el)return;
  var short=function(u){return(u||'').replace(/^https?:\/\/[^\/]+/,'').substring(0,34);};
  // Títulos
  var titRows=gR('titulos','Título 1');
  el.innerHTML=!titRows.length?'<div class="ym-cs">Sube "títulos_de_página_todo.csv" (pestaña Page Titles de Screaming Frog).</div>':(function(){
    var dup=titRows.filter(function(r){return N(r['Repeticiones'])>1;});
    var bad=titRows.filter(function(r){var l=N(r['Longitud del título 1']);return l>0&&(l<40||l>60);});
    var empty=titRows.filter(function(r){return!(r['Título 1']||'').trim();});
    return'<div class="ym-kgrid" style="margin-bottom:8px"><div class="ym-kcard ym-coral"><div class="ym-klbl">Duplicados</div><div class="ym-kval">'+dup.length+'</div></div><div class="ym-kcard ym-amber"><div class="ym-klbl">Fuera de rango</div><div class="ym-kval">'+bad.length+'</div></div><div class="ym-kcard ym-coral"><div class="ym-klbl">Vacíos</div><div class="ym-kval">'+empty.length+'</div></div></div>'+
      (dup.length?'<table class="ym-dt"><thead><tr><th>Página</th><th>Título</th><th>Repeticiones</th></tr></thead><tbody>'+dup.slice(0,10).map(function(r){return'<tr><td><span class="ym-mono" style="font-size:9px">'+short(r['Dirección'])+'</span></td><td style="font-size:9px">'+(r['Título 1']||'').substring(0,40)+'</td><td style="color:var(--ym-coral)">'+r['Repeticiones']+'</td></tr>';}).join('')+'</tbody></table>':'<div class="ym-cs">Sin títulos duplicados.</div>');
  })();
  // Meta descriptions
  var elM=document.getElementById('ymOPMetas');
  var metaRows=gR('metas','Meta description 1');
  elM.innerHTML=!metaRows.length?'<div class="ym-cs">Sube "meta_description_todo.csv" (pestaña Meta Description de Screaming Frog).</div>':(function(){
    var dup=metaRows.filter(function(r){return N(r['Repeticiones'])>1;});
    var empty=metaRows.filter(function(r){return!(r['Meta description 1']||'').trim();});
    var bad=metaRows.filter(function(r){var l=N(r['Longitud de la meta description 1']);return l>0&&(l<120||l>158);});
    return'<div class="ym-kgrid" style="margin-bottom:8px"><div class="ym-kcard ym-coral"><div class="ym-klbl">Duplicadas</div><div class="ym-kval">'+dup.length+'</div></div><div class="ym-kcard ym-coral"><div class="ym-klbl">Ausentes</div><div class="ym-kval">'+empty.length+'</div></div><div class="ym-kcard ym-amber"><div class="ym-klbl">Fuera de rango</div><div class="ym-kval">'+bad.length+'</div></div></div>'+
      (empty.length?'<table class="ym-dt"><thead><tr><th>Página sin meta description</th></tr></thead><tbody>'+empty.slice(0,10).map(function(r){return'<tr><td><span class="ym-mono" style="font-size:9px">'+short(r['Dirección'])+'</span></td></tr>';}).join('')+'</tbody></table>':'<div class="ym-cs">Ninguna página sin meta description.</div>');
  })();
  // H1
  var elH=document.getElementById('ymOPH1');
  var h1Rows=gR('h1s','H1-1');
  elH.innerHTML=!h1Rows.length?'<div class="ym-cs">Sube "h1_todo.csv" (pestaña H1 de Screaming Frog).</div>':(function(){
    var dup=h1Rows.filter(function(r){return N(r['Repeticiones'])>1;});
    var empty=h1Rows.filter(function(r){return!(r['H1-1']||'').trim();});
    var multi=h1Rows.filter(function(r){return(r['H1-2']||'').trim()!=='';});
    return'<div class="ym-kgrid" style="margin-bottom:8px"><div class="ym-kcard ym-coral"><div class="ym-klbl">Duplicados</div><div class="ym-kval">'+dup.length+'</div></div><div class="ym-kcard ym-coral"><div class="ym-klbl">Ausentes</div><div class="ym-kval">'+empty.length+'</div></div><div class="ym-kcard ym-amber"><div class="ym-klbl">Múltiples H1</div><div class="ym-kval">'+multi.length+'</div></div></div>'+
      (empty.length?'<table class="ym-dt"><thead><tr><th>Página sin H1</th></tr></thead><tbody>'+empty.slice(0,10).map(function(r){return'<tr><td><span class="ym-mono" style="font-size:9px">'+short(r['Dirección'])+'</span></td></tr>';}).join('')+'</tbody></table>':'<div class="ym-cs">Ninguna página sin H1.</div>');
  })();
  // Canonicals
  var elC=document.getElementById('ymOPCanon');
  var canRows=gR('canonicals','Elemento de enlace canónico 1');
  elC.innerHTML=!canRows.length?'<div class="ym-cs">Sube "canonicals_todo.csv" (pestaña Canonicals de Screaming Frog).</div>':(function(){
    var empty=canRows.filter(function(r){return!(r['Elemento de enlace canónico 1']||'').trim();});
    var pointsAway=canRows.filter(function(r){var c=(r['Elemento de enlace canónico 1']||'').trim(),d=(r['Dirección']||'').trim();return c&&d&&c!==d;});
    return'<div class="ym-kgrid" style="margin-bottom:8px"><div class="ym-kcard ym-amber"><div class="ym-klbl">Sin canonical</div><div class="ym-kval">'+empty.length+'</div></div><div class="ym-kcard ym-coral"><div class="ym-klbl">Apunta a otra URL</div><div class="ym-kval">'+pointsAway.length+'</div></div></div>'+
      (pointsAway.length?'<table class="ym-dt"><thead><tr><th>Página</th><th>Canonical apunta a</th></tr></thead><tbody>'+pointsAway.slice(0,10).map(function(r){return'<tr><td><span class="ym-mono" style="font-size:9px">'+short(r['Dirección'])+'</span></td><td style="font-size:9px;color:var(--ym-amber)">'+short(r['Elemento de enlace canónico 1'])+'</td></tr>';}).join('')+'</tbody></table>':'<div class="ym-cs">Ninguna URL con canonical hacia otra página distinta (confirma que las que sí lo hacen son intencionadas).</div>');
  })();
  // Contenido / duplicados
  var elCo=document.getElementById('ymOPContent');
  var conRows=gR('contenido','Recuento de palabras');
  elCo.innerHTML=!conRows.length?'<div class="ym-cs">Sube "contenido_todo.csv" (pestaña Content de Screaming Frog).</div>':(function(){
    var nearDup=conRows.filter(function(r){return(r['Coincidencia casi duplicada más cercana']||'').trim()!=='';});
    var lowRead=conRows.filter(function(r){var f=N(r['Puntuación de facilidad de lectura de Flesch']);return f>0&&f<30;});
    return'<div class="ym-kgrid" style="margin-bottom:8px"><div class="ym-kcard ym-coral"><div class="ym-klbl">Casi-duplicados</div><div class="ym-kval">'+nearDup.length+'</div></div><div class="ym-kcard ym-amber"><div class="ym-klbl">Lectura muy difícil</div><div class="ym-kval">'+lowRead.length+'</div></div></div>'+
      (nearDup.length?'<table class="ym-dt"><thead><tr><th>Página</th><th>Casi-duplicado de</th></tr></thead><tbody>'+nearDup.slice(0,10).map(function(r){return'<tr><td><span class="ym-mono" style="font-size:9px">'+short(r['Dirección'])+'</span></td><td style="font-size:9px;color:var(--ym-coral)">'+short(r['Coincidencia casi duplicada más cercana'])+'</td></tr>';}).join('')+'</tbody></table>':'<div class="ym-cs">Sin contenido casi-duplicado detectado.</div>');
  })();
  // Datos estructurados
  var elS=document.getElementById('ymOPStruct');
  var stRows=gR('estructurados','Errores');
  elS.innerHTML=!stRows.length?'<div class="ym-cs">Sube "datos_estructurados_todo.csv" (pestaña Structured Data de Screaming Frog, requiere validación activada).</div>':(function(){
    var withErr=stRows.filter(function(r){return N(r['Errores'])>0;});
    var withWarn=stRows.filter(function(r){return N(r['Advertencias'])>0;});
    return'<div class="ym-kgrid" style="margin-bottom:8px"><div class="ym-kcard ym-coral"><div class="ym-klbl">Con errores</div><div class="ym-kval">'+withErr.length+'</div></div><div class="ym-kcard ym-amber"><div class="ym-klbl">Con advertencias</div><div class="ym-kval">'+withWarn.length+'</div></div></div>'+
      (withErr.length?'<table class="ym-dt"><thead><tr><th>Página</th><th>Errores</th><th>Tipos detectados</th></tr></thead><tbody>'+withErr.slice(0,10).map(function(r){return'<tr><td><span class="ym-mono" style="font-size:9px">'+short(r['Dirección'])+'</span></td><td style="color:var(--ym-coral)">'+r['Errores']+'</td><td style="font-size:9px">'+[r['Tipo 1'],r['Tipo 2'],r['Tipo 3']].filter(Boolean).join(', ')+'</td></tr>';}).join('')+'</tbody></table>':'<div class="ym-cs">Ninguna página con errores en datos estructurados.</div>');
  })();
  // Accesibilidad
  var elA=document.getElementById('ymOPA11y');
  var a11yRows=gR('accesibilidad','All infracciones');
  elA.innerHTML=!a11yRows.length?'<div class="ym-cs">Sube "accesibilidad_todo.csv" (pestaña Accessibility de Screaming Frog).</div>':(function(){
    var totalInf=a11yRows.reduce(function(a,r){return a+N(r['All infracciones']);},0);
    var aa=a11yRows.reduce(function(a,r){return a+N(r['WCAG 2.1 AA infracciones']);},0);
    var worst=[].concat(a11yRows).sort(function(a,b){return N(b['All infracciones'])-N(a['All infracciones']);}).filter(function(r){return N(r['All infracciones'])>0;}).slice(0,10);
    return'<div class="ym-kgrid" style="margin-bottom:8px"><div class="ym-kcard ym-coral"><div class="ym-klbl">Infracciones totales</div><div class="ym-kval">'+FMT(totalInf)+'</div></div><div class="ym-kcard ym-amber"><div class="ym-klbl">WCAG 2.1 AA</div><div class="ym-kval">'+FMT(aa)+'</div></div></div>'+
      (worst.length?'<table class="ym-dt"><thead><tr><th>Página</th><th>Infracciones</th><th>WCAG 2.1 AA</th></tr></thead><tbody>'+worst.map(function(r){return'<tr><td><span class="ym-mono" style="font-size:9px">'+short(r['Dirección'])+'</span></td><td style="color:var(--ym-coral)">'+r['All infracciones']+'</td><td>'+r['WCAG 2.1 AA infracciones']+'</td></tr>';}).join('')+'</tbody></table>':'<div class="ym-cs">Sin infracciones de accesibilidad detectadas.</div>');
  })();
  // Códigos de respuesta (rastreo propio)
  var elR=document.getElementById('ymOPResp');
  var respRows=gR('sf_responses','Código de respuesta');
  elR.innerHTML=!respRows.length?'<div class="ym-cs">Sube "código de respuesta_todo.csv" (pestaña Response Codes de Screaming Frog).</div>':(function(){
    var buckets={'2xx':0,'3xx':0,'4xx':0,'5xx':0};
    respRows.forEach(function(r){var c=N(r['Código de respuesta']);var b=c>=200&&c<300?'2xx':c>=300&&c<400?'3xx':c>=400&&c<500?'4xx':c>=500?'5xx':null;if(b)buckets[b]++;});
    var bad=respRows.filter(function(r){var c=N(r['Código de respuesta']);return c>=400;});
    return'<div class="ym-kgrid" style="margin-bottom:8px"><div class="ym-kcard ym-lime"><div class="ym-klbl">2xx</div><div class="ym-kval">'+buckets['2xx']+'</div></div><div class="ym-kcard ym-amber"><div class="ym-klbl">3xx</div><div class="ym-kval">'+buckets['3xx']+'</div></div><div class="ym-kcard ym-coral"><div class="ym-klbl">4xx</div><div class="ym-kval">'+buckets['4xx']+'</div></div><div class="ym-kcard ym-coral"><div class="ym-klbl">5xx</div><div class="ym-kval">'+buckets['5xx']+'</div></div></div>'+
      (bad.length?'<table class="ym-dt"><thead><tr><th>Página</th><th>Código</th><th>Enlaces internos que la señalan</th></tr></thead><tbody>'+bad.slice(0,12).map(function(r){return'<tr><td><span class="ym-mono" style="font-size:9px">'+short(r['Dirección'])+'</span></td><td style="color:var(--ym-coral)">'+r['Código de respuesta']+'</td><td>'+N(r['Enlaces internos'])+'</td></tr>';}).join('')+'</tbody></table>':'<div class="ym-cs">Sin errores 4xx/5xx en tu propio rastreo.</div>');
  })();
  // PageSpeed
  var elP=document.getElementById('ymOPSpeed');
  var psRows=gR('pagespeed','Puntuación de rendimiento');
  elP.innerHTML=!psRows.length?'<div class="ym-cs">Sube "pagespeed_todo.csv" (Screaming Frog conectado a la API de PageSpeed Insights).</div>':(function(){
    var avgPerf=psRows.reduce(function(a,r){return a+N(r['Puntuación de rendimiento']);},0)/psRows.length;
    var avgLCP=psRows.reduce(function(a,r){return a+N((r['Largest Contentful Paint tiempo (ms)']||'0').toString().replace(',','.'));},0)/psRows.length;
    var avgCLS=psRows.reduce(function(a,r){return a+N((r['Cumulative Layout Shift']||'0').toString().replace(',','.'));},0)/psRows.length;
    var worst=[].concat(psRows).sort(function(a,b){return N(a['Puntuación de rendimiento'])-N(b['Puntuación de rendimiento']);}).slice(0,10);
    return'<div class="ym-kgrid" style="margin-bottom:8px"><div class="ym-kcard '+(avgPerf<50?'ym-coral':avgPerf<90?'ym-amber':'ym-lime')+'"><div class="ym-klbl">Rendimiento medio</div><div class="ym-kval">'+avgPerf.toFixed(0)+'</div></div><div class="ym-kcard '+(avgLCP>4000?'ym-coral':avgLCP>2500?'ym-amber':'ym-lime')+'"><div class="ym-klbl">LCP medio</div><div class="ym-kval">'+(avgLCP/1000).toFixed(1)+'s</div></div><div class="ym-kcard '+(avgCLS>0.25?'ym-coral':avgCLS>0.1?'ym-amber':'ym-lime')+'"><div class="ym-klbl">CLS medio</div><div class="ym-kval">'+avgCLS.toFixed(3)+'</div></div></div>'+
      '<table class="ym-dt"><thead><tr><th>Página más lenta</th><th>Rendimiento</th><th>LCP</th></tr></thead><tbody>'+worst.map(function(r){return'<tr><td><span class="ym-mono" style="font-size:9px">'+short(r['Dirección'])+'</span></td><td style="color:'+(N(r['Puntuación de rendimiento'])<50?'var(--ym-coral)':'var(--ym-amber)')+'">'+r['Puntuación de rendimiento']+'</td><td>'+(N((r['Largest Contentful Paint tiempo (ms)']||'0').toString().replace(',','.'))/1000).toFixed(1)+'s</td></tr>';}).join('')+'</tbody></table>';
  })();
}
function ymVizIframe(key,label){
  var f=YM.files[key];
  if(!f||!f.html)return'<div class="ym-cs">Sube "'+label+'" (Screaming Frog → Visualizations/Visualizaciones → '+label+', exportado como HTML) para verlo aquí.</div>';
  var id='ymviz_'+key;
  setTimeout(function(){var el=document.getElementById(id);if(el)el.srcdoc=f.html;},0);
  return'<iframe id="'+id+'" style="width:100%;height:420px;border:1px solid var(--ym-rim);border-radius:8px;background:#fff" sandbox="allow-scripts"></iframe>';
}
function ymEnlazadoPanel(){
  var wrapC=document.getElementById('ymENLDiagCrawl');
  if(!wrapC)return;
  wrapC.innerHTML=ymVizIframe('viz_force_crawl','Diagrama de rastreo forzado');
  document.getElementById('ymENLDiagDir').innerHTML=ymVizIframe('viz_force_dir','Diagrama de árbol de directorio forzado');
  document.getElementById('ymENLTreeCrawl').innerHTML=ymVizIframe('viz_tree_crawl','Gráfico de árbol del rastreo');
  document.getElementById('ymENLTreeDir').innerHTML=ymVizIframe('viz_tree_dir','Gráfico de árbol del directorio');
  var f=YM.files['crawl_sf'];
  var elOrphan=document.getElementById('ymENLOrphan'),elUnder=document.getElementById('ymENLUnder');
  if(!f||!f.sections.length||!f.sections[0].rows.length){
    var msg='<div class="ym-cs">Sube el rastreo completo de Screaming Frog para ver páginas huérfanas y mal enlazadas.</div>';
    if(elOrphan)elOrphan.innerHTML=msg;if(elUnder)elUnder.innerHTML=msg;
    return;
  }
  var rows=f.sections[0].rows;
  var htmlRows=rows.filter(function(r){return(r['Tipo de contenido']||'').indexOf('text/html')>-1;});
  var orphans=htmlRows.filter(function(r){return N(r['Enlaces internos únicos'])===0;});
  if(elOrphan){
    elOrphan.innerHTML=!orphans.length?'<div class="ym-cs">Ninguna página huérfana detectada — todo tu contenido indexable recibe al menos un enlace interno.</div>':
      '<table class="ym-dt"><thead><tr><th>Página</th><th>Indexabilidad</th><th>Impr. (GSC)</th></tr></thead><tbody>'+
      orphans.map(function(r){return'<tr><td><span class="ym-mono" style="font-size:9px">'+(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'').substring(0,36)+'</span></td><td style="color:var(--ym-coral)">'+(r['Indexabilidad']||'')+'</td><td>'+FMT(N(r['Impresiones']))+'</td></tr>';}).join('')+'</tbody></table>'+
      '<div class="ym-cs" style="margin-top:8px">'+orphans.length+' página(s) sin ningún enlace interno detectado — Google solo puede encontrarlas por sitemap, no navegando tu web. Enlázalas desde alguna página relevante.</div>';
  }
  if(elUnder){
    var withInterest=htmlRows.filter(function(r){return N(r['Clics'])>0||N(r['Impresiones'])>0;});
    var underlinked=withInterest.filter(function(r){return N(r['Enlaces internos únicos'])>0&&N(r['Enlaces internos únicos'])<8;}).sort(function(a,b){return N(b['Impresiones'])-N(a['Impresiones']);}).slice(0,15);
    elUnder.innerHTML=!underlinked.length?'<div class="ym-cs">Ninguna página con interés en buscadores está mal enlazada — buena arquitectura interna.</div>':
      '<table class="ym-dt"><thead><tr><th>Página</th><th>Enlaces internos únicos</th><th>Impr.</th><th>Clics</th></tr></thead><tbody>'+
      underlinked.map(function(r){return'<tr><td><span class="ym-mono" style="font-size:9px">'+(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'').substring(0,32)+'</span></td><td style="color:var(--ym-amber)">'+N(r['Enlaces internos únicos'])+'</td><td>'+FMT(N(r['Impresiones']))+'</td><td>'+N(r['Clics'])+'</td></tr>';}).join('')+'</tbody></table>';
  }
}
function ymScreamingFrog(){
  var f=YM.files['crawl_sf'];
  var elI=document.getElementById('ymSFI'),elA=document.getElementById('ymSFA');
  if(!f||!f.sections.length||!f.sections[0].rows.length){
    var msg='<div class="ym-cs">Sube el CSV de exportación completa de un rastreo con Screaming Frog (todas las columnas, incluyendo Search Console y GA4 conectados) para ver este análisis.</div>';
    elI.innerHTML=msg;elA.innerHTML=msg;return;
  }
  var rows=f.sections[0].rows;
  var htmlRows=rows.filter(function(r){return(r['Tipo de contenido']||'').indexOf('text/html')>-1;});
  var withInterest=htmlRows.filter(function(r){return N(r['Clics'])>0||N(r['Impresiones'])>0;}).map(function(r){
    return{url:r['Dirección'],clicks:N(r['Clics']),impr:N(r['Impresiones']),inlinks:N(r['Enlaces internos únicos']),depth:N(r['Nivel de profundidad'])};
  });
  var underlinked=withInterest.filter(function(x){return x.inlinks<8;}).sort(function(a,b){return b.clicks-a.clicks;}).slice(0,15);
  elI.innerHTML=!underlinked.length?'<div class="ym-cs">Ninguna página con interés en buscadores tiene pocos enlaces internos — buen enlazado interno.</div>':
    '<table class="ym-dt"><thead><tr><th>Página</th><th>Clics</th><th>Impr.</th><th>Enlaces internos</th></tr></thead><tbody>'+
    underlinked.map(function(x){return'<tr><td><span class="ym-mono" style="font-size:9px">'+(x.url||'').replace(/^https?:\/\/[^\/]+/,'').substring(0,32)+'</span></td><td>'+FMT(x.clicks)+'</td><td>'+FMT(x.impr)+'</td><td style="color:'+(x.inlinks<3?'var(--ym-coral)':'var(--ym-amber)')+'">'+x.inlinks+'</td></tr>';}).join('')+'</tbody></table>';
  var issues=htmlRows.filter(function(r){return(r['Estado de indexabilidad']||'').trim()!=='';});
  var titleMap={};
  htmlRows.forEach(function(r){var t=(r['Título 1']||'').trim();if(!t)return;titleMap[t]=titleMap[t]||[];titleMap[t].push(r['Dirección']);});
  var dupTitles=Object.keys(titleMap).filter(function(t){return titleMap[t].length>1;});
  var orphans=htmlRows.filter(function(r){return N(r['Enlaces internos únicos'])===0&&(r['Estado de indexabilidad']||'').trim()==='';});
  var parts=[];
  if(issues.length)parts.push('<div class="ym-alert ym-aa"><span class="ym-ai">🟡</span><div><strong>'+issues.length+' páginas con problema de indexabilidad</strong>'+issues.slice(0,4).map(function(r){return(r['Estado de indexabilidad']||'')+': '+(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'');}).join(' · ')+'<br><span style="color:var(--ym-lime);font-weight:600">→ Qué hacer: revisa cada una — si el redirect/noindex es intencional déjalo, si no, corrígelo o quítalo del sitemap.</span></div></div>');
  if(dupTitles.length)parts.push('<div class="ym-alert ym-aa"><span class="ym-ai">🟡</span><div><strong>'+dupTitles.length+' títulos duplicados</strong>'+dupTitles.slice(0,3).join(' · ')+'<br><span style="color:var(--ym-lime);font-weight:600">→ Qué hacer: diferencia cada título con la keyword específica de esa página.</span></div></div>');
  if(orphans.length)parts.push('<div class="ym-alert ym-ar"><span class="ym-ai">🔴</span><div><strong>'+orphans.length+' páginas huérfanas</strong>indexables pero sin ningún enlace interno detectado<br><span style="color:var(--ym-lime);font-weight:600">→ Qué hacer: añade al menos un enlace interno a cada una desde contenido relacionado.</span></div></div>');
  elA.innerHTML=parts.length?parts.join(''):'<div class="ym-alert ym-al"><span class="ym-ai">🟢</span><div><strong>Sin problemas técnicos relevantes detectados</strong>en indexabilidad, duplicados ni páginas huérfanas.</div></div>';
}
function ymComputeDiagnosis(){
  var findings=[];
  var k=ymComputeKpis();

  // Señal: errores fatales del servidor
  var errParsed=ymParseErrorLog();
  var memoryErrors=0,fatalTotal=0,topWarnKey=null,topWarnN=0,uncaughtN=0,topPluginD=null,topPluginPctD=0,topPluginLastD=null,topPluginRecentD=false;
  if(errParsed){
    fatalTotal=errParsed.totalFatal;
    Object.keys(errParsed.counts).forEach(function(key){
      var n=errParsed.counts[key];
      if(/Allowed memory size/.test(key))memoryErrors+=n;
      if(/Uncaught Exception/.test(key))uncaughtN+=n;
      if(key.indexOf('Warning:')===0&&!/Allowed memory size/.test(key)&&n>topWarnN){topWarnKey=key;topWarnN=n;}
    });
    var byPluginD=Object.keys(errParsed.pluginCounts||{}).map(function(k){return{k:k,n:errParsed.pluginCounts[k],last:errParsed.pluginLastDate?errParsed.pluginLastDate[k]:null};}).sort(function(a,b){return b.n-a.n;});
    if(byPluginD.length&&byPluginD[0].k.indexOf('Núcleo')===-1){
      topPluginD=byPluginD[0].k.replace(/^(Plugin|Tema): /,'');
      topPluginPctD=errParsed.total?(byPluginD[0].n/errParsed.total*100):0;
      topPluginLastD=byPluginD[0].last;
      topPluginRecentD=topPluginLastD?((new Date()-new Date(topPluginLastD))/(1000*60*60*24)<=14):false;
    }
  }

  // Señal: códigos de respuesta del rastreo (Search Console)
  var respRows=(YM.files['cs_responses']||{sections:[]}).sections[0];respRows=respRows?respRows.rows:[];
  var pct404=0;
  respRows.forEach(function(r){if(/404/.test(r['Respuesta']||''))pct404=N((r['Ratio total de solicitudes']||'0').toString().replace(',','.'))*100;});

  // Señal: presupuesto de rastreo por tipo de archivo
  var ftRows=(YM.files['cs_filetypes']||{sections:[]}).sections[0];ftRows=ftRows?ftRows.rows:[];
  var cssP=ftRows.find(function(r){return r['Tipo de archivo']==='CSS';});
  var jsP=ftRows.find(function(r){return r['Tipo de archivo']==='JavaScript';});
  var assetsPct=(cssP?N((cssP['Ratio total de solicitudes']||'0').toString().replace(',','.')):0)+(jsP?N((jsP['Ratio total de solicitudes']||'0').toString().replace(',','.')):0);

  // Señal: crawl completo de Screaming Frog
  var sfFile=YM.files['crawl_sf'];
  var sfRows=sfFile&&sfFile.sections.length?sfFile.sections[0].rows:[];
  var sf404=sfRows.filter(function(r){return(r['Código de respuesta']||'')==='404';});
  var htmlRows=sfRows.filter(function(r){return(r['Tipo de contenido']||'').indexOf('text/html')>-1;});
  var withInterest=htmlRows.filter(function(r){return N(r['Clics'])>0||N(r['Impresiones'])>0;});
  var orphansWithTraffic=withInterest.filter(function(r){return N(r['Enlaces internos únicos'])===0;});

  // Señal: consultas/páginas SEO, canales, leads por página
  var qRows=ymGetQRows(),pageRows=ymGetPageRows();
  var TK='Grupo de canales principal de la sesión (Grupo de canales predeterminado)';
  var tc=gD('traffic_acq',TK)[0];
  var bkRows=gR('backlinks','Página de destino');
  var landingRows=gR('landing','Página de destino');

  // REGLA 0: plugin/tema dominante en el log, identificado automáticamente.
  // OJO: esto es frecuencia de aparición en el log, no una prueba de causalidad —
  // un plugin puede dominar el log simplemente porque el fallo real ocurre en
  // datos corruptos que ese plugin intenta leer, no porque el plugin en si este
  // roto. Por eso el texto nunca recomienda desinstalar directamente, solo investigar.
  if(topPluginD&&topPluginPctD>=40){
    var ctxText=ymPatientContext().allText;
    var pluginNameLc=topPluginD.toLowerCase();
    var ctxMentionsLog=/\b(log|error_log|error)\b/.test(ctxText);
    var ctxOverlap=ctxMentionsLog&&(ctxText.indexOf(pluginNameLc)>-1||/antes de|ya (se|est[a\u00e1]|fue)|resuelto|solucionado|arregl|corrupt|borr[ea]/.test(ctxText));
    var ctxNote=ctxOverlap?'<br><br>\u26a0\ufe0f <strong>Tienes una anotaci\u00f3n de contexto operativo que parece hablar de esto mismo</strong> \u2014 rev\u00edsala en la pesta\u00f1a Anotaciones antes de actuar: puede que ya est\u00e9 resuelto y este hallazgo sea historial del log, no un problema activo.':(ctxMentionsLog?'<br><br>\ud83d\udcac Tienes alguna anotaci\u00f3n que menciona "log" o "error" \u2014 rev\u00edsala por si es relevante para este hallazgo antes de actuar.':'');
    findings.push({sev:(topPluginRecentD&&!ctxOverlap)?'critical':'warning',area:'T\u00e9cnico',title:topPluginD+' aparece en el '+topPluginPctD.toFixed(0)+'% de las l\u00edneas de tu error_log'+(topPluginLastD?(topPluginRecentD?' (\u00faltima entrada: '+topPluginLastD+')':' (\u00faltima entrada: '+topPluginLastD+', probablemente hist\u00f3rico)'):''),
      text:(topPluginRecentD?'Es pr\u00e1cticamente un \u00fanico origen dominando el log, y la \u00faltima entrada es reciente. Esto no prueba por s\u00ed solo que "'+topPluginD+'" est\u00e9 roto \u2014 puede ser la causa, o puede ser donde otro problema (p.ej. datos corruptos de una p\u00e1gina) termina fallando. Antes de tomar cualquier acci\u00f3n sobre el plugin, localiza el mensaje de error exacto y en qu\u00e9 post/p\u00e1gina ocurre.':'Este volumen es mayoritariamente historial acumulado del log (los archivos de error de PHP no se vac\u00edan solos al desinstalar un plugin). Si ya no tienes "'+topPluginD+'" activo, o si ya identificaste y arreglaste la causa real, esto no es un problema actual.')+ctxNote,
      action:'Busca el mensaje de error exacto en el log (no solo el nombre del plugin) y en qu\u00e9 post/ID ocurre. Si el post existe y su contenido se ve mal en el editor, revisa sus metadatos antes de tocar el plugin \u2014 un dato corrupto puede parecer un fallo del plugin sin serlo. Solo considera desactivar o desinstalar "'+topPluginD+'" si confirmas que el error persiste en un post/contenido que sabes que est\u00e1 limpio.',
      risk:(topPluginRecentD&&!ctxOverlap)?'Si el problema de fondo sigue sin resolverse, cada fallo es una petici\u00f3n que no se completa para un usuario real (o para Googlebot) en ese instante.':null});
  }
  // REGLA 1: leads a 0 + errores de memoria en el servidor
  if(k.hasLeadData&&k.leadsC===0&&memoryErrors>0){
    var convCh1=ymDeclaredConvChannel();
    findings.push({sev:'critical',area:'Técnico',title:'Tus leads están a 0 probablemente por los mismos cuelgues de memoria del servidor, no por falta de interés',
      text:'Detecté '+FMT(memoryErrors)+' errores de "memoria agotada" en tu error_log, y a la vez 0 eventos de conversión en el período actual. Cuando PHP se queda sin memoria a mitad de una petición, '+(convCh1?('un contacto por '+convCh1+' (tu canal real de conversión, según tu contexto declarado) podría no llegar a completarse o registrarse correctamente'):'el envío de un formulario puede fallar en silencio sin llegar a registrar el evento en GA4')+'.'+(topPluginD?' El origen más probable de esos cuelgues es "'+topPluginD+'" (ver hallazgo de arriba).':''),
      action:topPluginD?('Resuelve primero "'+topPluginD+'" — es la causa más probable de estos cuelgues de memoria.'):'Sube el memory_limit de PHP (wp-config.php o php.ini) e identifica qué plugin dispara ese consumo antes de tocar nada de marketing o copy.',
      risk:'Mientras esto no se arregle, cualquier campaña, mención o pico de tráfico que consigas se traduce en 0 oportunidades reales — estás pagando el coste de atraer visitas sin poder capturar ninguna.'});
  }
  // REGLA 2: 404 en crawl stats + URLs concretas rotas
  if(pct404>1.5&&sf404.length){
    var urls404=sf404.slice(0,4).map(function(r){return(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'');});
    findings.push({sev:'warning',area:'Técnico',title:'El '+pct404.toFixed(2)+'% del rastreo de Googlebot choca con un 404 — y tengo la lista exacta de URLs',
      text:'Estas URLs de tu propio rastreo devuelven 404: '+urls404.join(' · ')+'.',
      action:'Crea redirecciones 301 desde esas '+sf404.length+' URLs hacia la página viva más relevante: '+urls404.slice(0,2).join(', ')+(sf404.length>2?'...':'')+'.',
      risk:'Si estas URLs tenían enlaces externos o posiciones ganadas, ese valor se pierde con el tiempo — Google acaba desindexándolas y cualquier autoridad que aportaban no se transfiere a ninguna otra página.'});
  }
  // REGLA 3: presupuesto de rastreo en assets + servidor con problemas de memoria
  if(assetsPct>0.5&&memoryErrors>0){
    findings.push({sev:'warning',area:'Técnico',title:'Googlebot gasta '+(assetsPct*100).toFixed(0)+'% de su rastreo en CSS/JS mientras tu servidor sufre de memoria — mismo origen probable',
      text:'Un servidor que agota memoria a menudo también sirve archivos estáticos sin caché eficiente, obligando a Googlebot a repetir peticiones de CSS/JS en cada rastreo.',
      action:'Activa o revisa el plugin de caché de página y de archivos estáticos (CSS/JS) — ataca los dos problemas a la vez.'});
  }
  // REGLA 4: páginas huérfanas con tráfico de búsqueda real
  if(orphansWithTraffic.length){
    var orphUrls=orphansWithTraffic.slice(0,3).map(function(r){return(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'');});
    findings.push({sev:'warning',area:'Enlazado interno',title:orphansWithTraffic.length+' página(s) reciben clics de búsqueda reales pero no tienen ningún enlace interno',
      text:orphansWithTraffic.slice(0,3).map(function(r){return(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'')+' ('+N(r['Clics'])+' clics)';}).join(' · ')+'. Google las conoce por el sitemap o enlaces externos, pero un usuario navegando tu web nunca llegaría a ellas.',
      action:'Añade al menos un enlace interno desde una página relacionada hacia: '+orphUrls.join(', ')+'.',
      risk:'Sin enlaces internos, Google tiende a rastrearlas cada vez con menos frecuencia y a darles menos peso relativo — con el tiempo suelen perder posición aunque el contenido no haya cambiado.'});
  }
  // REGLA 5: autoridad externa (backlinks) vs. tráfico real desalineados
  if(bkRows.length&&pageRows.length){
    var topBacklink=[].concat(bkRows).sort(function(a,b){return N(b['Enlaces entrantes'])-N(a['Enlaces entrantes']);})[0];
    var topClicksPage=[].concat(pageRows).filter(function(r){return r.clicks>0;}).sort(function(a,b){return b.clicks-a.clicks;})[0];
    if(topBacklink&&topClicksPage){
      var bkPath=(topBacklink['Página de destino']||'').replace(/^https?:\/\/[^\/]+/,'');
      var clPath=(topClicksPage.name||'').replace(/^https?:\/\/[^\/]+/,'');
      if(bkPath&&clPath&&bkPath!==clPath){
        findings.push({sev:'info',area:'Enlazado interno',title:'Tu autoridad externa (backlinks) y tu tráfico de búsqueda real apuntan a páginas distintas',
          text:'La mayoría de tus enlaces entrantes ('+FMT(N(topBacklink['Enlaces entrantes']))+') apuntan a '+bkPath+', pero tu página con más clics de búsqueda es '+clPath+'.',
          action:'Añade un enlace interno desde '+bkPath+' hacia '+clPath+' para transferir parte de esa autoridad hacia donde ya tienes tracción real.'});
      }
    }
  }
  // REGLA 6: canal principal sin ningún evento clave
  if(tc.length){
    var topSessChannel=[].concat(tc).sort(function(a,b){return N(b['Sesiones'])-N(a['Sesiones']);})[0];
    if(topSessChannel&&N(topSessChannel['Sesiones'])>20&&N(topSessChannel['Eventos clave'])===0){
      findings.push({sev:'info',area:'Conversión',title:'Tu canal principal ('+(topSessChannel[TK]||'')+') no genera ni un solo evento clave',
        text:FMT(N(topSessChannel['Sesiones']))+' sesiones por este canal y 0 eventos clave asociados.',
        action:'Revisa en GA4 si el evento de conversión está bien configurado y se dispara para el tipo de tráfico que llega por "'+(topSessChannel[TK]||'')+'".'});
    }
  }
  // REGLA 7: títulos duplicados que coinciden con consultas en zona de impacto
  var titleMap={};
  htmlRows.forEach(function(r){var t=(r['Título 1']||'').trim();if(!t)return;titleMap[t]=titleMap[t]||[];titleMap[t].push(r['Dirección']);});
  var dupTitles=Object.keys(titleMap).filter(function(t){return titleMap[t].length>1;});
  var sdz=qRows.filter(function(r){return r.pos>=4&&r.pos<=15;});
  if(dupTitles.length&&sdz.length){
    findings.push({sev:'warning',area:'SEO on-page',title:dupTitles.length+' títulos duplicados coinciden con consultas estancadas en posición 4-15',
      text:'Páginas con el mismo título compiten entre sí por la misma intención de búsqueda, lo que puede explicar por qué esas consultas no despegan a top 3.',
      action:'Diferencia estos títulos duplicados con la keyword específica de cada página: '+dupTitles.slice(0,2).join(' · ')+'.'});
  }
  // REGLA 8: mejor oportunidad de zona de impacto, con acción concreta por keyword
  if(sdz.length){
    var topSdz=[].concat(sdz).sort(function(a,b){return b.impr-a.impr;})[0];
    if(topSdz){
      findings.push({sev:'info',area:'SEO on-page',title:'Tu mejor oportunidad de "quick win": "'+topSdz.name+'" en posición '+topSdz.pos.toFixed(1),
        text:FMT(topSdz.impr)+' impresiones y CTR de '+topSdz.ctrPct.toFixed(2)+'% en posición 4-15 — está a un empujón de entrar en top 3, donde el CTR suele multiplicarse.',
        action:'Amplía el contenido que responde a "'+topSdz.name+'" (profundidad, datos concretos, actualización de fecha) y añade 2-3 enlaces internos desde páginas relacionadas hacia ella.',
        risk:'Las consultas en zona de impacto son volátiles: si no refuerzas la página, es tan probable que suba a top 3 como que otra web la adelante y caiga fuera del top 20 en el próximo update.'});
    }
  }
  // REGLA 9: páginas con tráfico de búsqueda real pero conversión 0% (cruce SEO + leads por página)
  if(pageRows.length&&landingRows.length){
    var zeroConvPages=[];
    pageRows.filter(function(r){return r.clicks>=5;}).forEach(function(pr){
      var prPath=(pr.name||'').replace(/^https?:\/\/[^\/]+/,'');
      var land=landingRows.find(function(lr){return(lr['Página de destino']||'').replace(/^https?:\/\/[^\/]+/,'')===prPath;});
      if(land&&N(land['Sesiones'])>0&&N(land['Eventos clave'])===0){
        zeroConvPages.push({path:prPath,clicks:pr.clicks,sess:N(land['Sesiones'])});
      }
    });
    if(zeroConvPages.length){
      var zc=zeroConvPages.sort(function(a,b){return b.clicks-a.clicks;})[0];
      var convCh9=ymDeclaredConvChannel();
      findings.push({sev:'warning',area:'Conversión',title:zeroConvPages.length+' página(s) con tráfico de búsqueda real no generan ni un solo lead',
        text:zc.path+' recibe '+FMT(zc.clicks)+' clics de búsqueda y '+FMT(zc.sess)+' sesiones de aterrizaje, pero 0 eventos clave registrados.'+(convCh9?' Ojo: esto puede ser un falso negativo — si tu conversión real es por '+convCh9+', GA4 no la ve como "evento clave" salvo que hayas configurado un evento específico para clics de contacto por '+convCh9+'.':''),
        action:convCh9?('Verifica que el enlace/botón de contacto por '+convCh9+' sea visible en '+zc.path+', y si quieres medirlo de verdad, configura un evento de GA4 que se dispare al hacer clic en ese enlace (no solo cuenta como "conversión" si no lo mides).'):'Revisa manualmente si '+zc.path+' tiene una llamada a la acción visible y un formulario funcionando — hay demanda real de búsqueda que no se está aprovechando.',
        risk:'Mientras no confirmes esto, cualquier decisión sobre "qué contenido funciona" que tomes usando el conteo de leads puede estar equivocada — quizás esta página SÍ convierte, solo que no lo estás midiendo.'});
    }
  }
  // REGLA 10: aviso de código dominante (no memoria) con volumen muy alto
  if(topWarnKey&&topWarnN>500){
    findings.push({sev:'warning',area:'Técnico',title:'"'+topWarnKey.replace('Warning: ','')+'" se repite '+FMT(topWarnN)+' veces en tu log',
      text:'No es un error fatal, pero un volumen tan alto (más de 500 repeticiones) suele indicar un plugin o tema desactualizado generando ruido constante en cada carga de página, lo que también consume recursos del servidor de forma innecesaria.',
      action:ymErrLogAction(topWarnKey)});
  }
  // REGLA 11: excepciones no capturadas (causa distinta a memoria)
  if(uncaughtN>100){
    findings.push({sev:'critical',area:'Técnico',title:'"Uncaught Exception" se repite '+FMT(uncaughtN)+' veces — causa distinta a la memoria agotada',
      text:'Estas excepciones no capturadas son una segunda causa real de fallos en tu sitio, independiente del problema de memoria. Cada una interrumpe la petición igual que un error fatal.',
      action:'Revisa el stack trace completo de "Uncaught Exception: Invalid data" en tu log — probablemente un plugin recibiendo datos en un formato que no espera.'});
  }
  // REGLA 12: volumen de problemas de indexabilidad detectados en el rastreo
  var sfFile2=YM.files['crawl_sf'];
  var sfRows2=sfFile2&&sfFile2.sections.length?sfFile2.sections[0].rows:[];
  var htmlRows2=sfRows2.filter(function(r){return(r['Tipo de contenido']||'').indexOf('text/html')>-1;});
  var idxIssues=htmlRows2.filter(function(r){return(r['Estado de indexabilidad']||'').trim()!=='';});
  if(idxIssues.length>=5){
    var redirCount=idxIssues.filter(function(r){return(r['Estado de indexabilidad']||'')==='Redirigido';}).length;
    findings.push({sev:'warning',area:'Técnico',title:idxIssues.length+' páginas de tu rastreo tienen algún problema de indexabilidad',
      text:redirCount+' de ellas son redirecciones. Si el sitemap sigue apuntando a URLs redirigidas, obligas a Google a dar un salto extra en cada rastreo en vez de ir directo al destino final.',
      action:'Actualiza el sitemap.xml para que apunte directamente a las URLs finales, no a las que redirigen.'});
  }
  // REGLA 13: canibalización con solapamiento alto entre páginas reales
  if(pageRows.length>=2){
    function slugWordsD(s){return(s||'').toLowerCase().replace(/https?:\/\/[^\/]+/,'').split(/[\/\-_?=&.]+/).filter(function(w){return w.length>3;});}
    var cands=pageRows.filter(function(r){return r.name&&r.name!=='/'&&r.name!=='(not set)';});
    var bestPair=null,bestRatio=0;
    for(var ci=0;ci<cands.length;ci++){
      for(var cj=ci+1;cj<cands.length;cj++){
        var w1=slugWordsD(cands[ci].name),w2=slugWordsD(cands[cj].name);
        if(!w1.length||!w2.length)continue;
        var shared=w1.filter(function(w){return w2.indexOf(w)>-1;});
        var ratio=shared.length/Math.min(w1.length,w2.length);
        if(ratio>bestRatio&&shared.length>=2){bestRatio=ratio;bestPair=[cands[ci],cands[cj]];}
      }
    }
    if(bestPair&&bestRatio>=0.6){
      var pA=(bestPair[0].name||'').replace(/^https?:\/\/[^\/]+/,''),pB=(bestPair[1].name||'').replace(/^https?:\/\/[^\/]+/,'');
      findings.push({sev:'info',area:'SEO on-page',title:'Posible canibalización entre '+pA+' y '+pB+' ('+(bestRatio*100).toFixed(0)+'% de solapamiento léxico)',
        text:'Ambas URLs comparten la mayoría de palabras significativas en su ruta, señal de que podrían estar compitiendo por la misma intención de búsqueda.',
        action:(bestRatio>=0.7?'Valora fusionar ambas en una sola página más completa.':'Diferencia claramente el enfoque de cada una o enlaza una desde la otra como contenido relacionado.')});
    }
  }
  // REGLA 14: cobertura real de indexación (GSC) que Screaming Frog no puede ver por sí solo
  var covFile=YM.files['coverage_issues'];
  if(covFile&&htmlRows.length){
    var covRows=covFile.sections.length?covFile.sections[0].rows:[];
    var covTotal=covRows.reduce(function(a,r){return a+N(r['Páginas']);},0);
    var sfIndexableCount=htmlRows.filter(function(r){return(r['Indexabilidad']||'')==='Indexable';}).length;
    if(covTotal>0){
      var notIndexedRow=covRows.find(function(r){return/actualmente sin indexar/i.test(r['Motivo']||'');});
      var notIndexedN=notIndexedRow?N(notIndexedRow['Páginas']):0;
      var covPct=sfIndexableCount?Math.round(covTotal/sfIndexableCount*100):0;
      findings.push({sev:covPct>=30?'critical':'warning',area:'Indexación',
        title:'GSC reporta '+covTotal+' páginas con problema real de indexación — Screaming Frog no las detecta por sí solo',
        text:'Screaming Frog marca '+sfIndexableCount+' URLs como "Indexable" porque no ve bloqueos técnicos (sin noindex, sin canonical fuera). Pero eso solo audita si la página PARECE indexable — Search Console es quien decide de verdad, y reporta '+covTotal+' páginas con problema'+(notIndexedN?(', '+notIndexedN+' de ellas rastreadas pero que Google ha decidido no indexar'):'')+'. Un crawler nunca puede ver esa decisión.',
        action:'Revisa el informe de Cobertura en Search Console, empezando por "Rastreada: actualmente sin indexar" — normalmente es contenido que Google considera de bajo valor o muy parecido a otra página ya indexada.',
        risk:'Son dos recuentos de universos distintos (URLs que rastrea tu crawler vs. URLs que Google conoce), así que no se puede leer como "X% de tus páginas" — pero el volumen que reporta GSC ('+covTotal+') es del mismo orden de magnitud que todo lo que Screaming Frog marca como indexable ('+sfIndexableCount+'). Un desajuste así de grande es la prueba de que auditar con una sola herramienta se queda corto.'});
    }
  }
  // REGLA 15: cero eventos clave en todos los canales, sin relación con errores de memoria (medición no configurada)
  if(tc.length){
    var totalSessAcq=tc.reduce(function(a,r){return a+N(r['Sesiones']);},0);
    var totalKeAcq=tc.reduce(function(a,r){return a+N(r['Eventos clave']);},0);
    if(totalSessAcq>=30&&totalKeAcq===0&&!(memoryErrors>0)){
      var chNames15=tc.map(function(r){return r[TK];}).filter(Boolean).join(', ');
      var convCh15=ymDeclaredConvChannel();
      findings.push({sev:'warning',area:'Conversión',
        title:'0 eventos clave en los '+tc.length+' canales de adquisición, con '+FMT(totalSessAcq)+' sesiones registradas',
        text:'Ningún canal ('+chNames15+') registra un solo evento clave en este período. No es que un canal convierta peor que otro: la conversión no se está midiendo en absoluto, así que hoy no se puede saber qué canal funciona de verdad.'+(convCh15?(' Esto encaja con que tu conversión real declarada es por '+convCh15+' — si no hay un evento de GA4 específico para eso, nunca aparecerá aquí aunque sí esté ocurriendo.'):''),
        action:'Configura en GA4 al menos un evento clave real (envío de formulario, clic a email/teléfono/WhatsApp) antes de tomar cualquier decisión de canal basada en "leads".',
        risk:'Cualquier optimización de canal que hagas ahora (recortar, priorizar contenido) se basaría en cero datos de conversión reales — podrías descartar un canal que sí funciona, solo que no lo estás midiendo.'});
    }
  }
  // REGLA 16: presupuesto de rastreo en CSS/JS sin errores de memoria de por medio (causa probable: versionado/caché de assets)
  if(assetsPct>0.5&&!(memoryErrors>0)&&ftRows.length){
    var htmlP=ftRows.find(function(r){return r['Tipo de archivo']==='HTML';});
    var htmlPctD=htmlP?N((htmlP['Ratio total de solicitudes']||'0').toString().replace(',','.'))*100:0;
    findings.push({sev:'info',area:'Técnico',
      title:'Googlebot gasta '+(assetsPct*100).toFixed(0)+'% de su rastreo en CSS/JS — solo '+htmlPctD.toFixed(0)+'% va a HTML',
      text:'Tu servidor no muestra errores de memoria, así que la causa más probable no es inestabilidad: suele ser caché estática pobre o parámetros de versión (?ver=X.X.X) en tus assets, que cambian en cada actualización de plugin/tema y obligan a Google a re-rastrear el archivo entero como si fuera nuevo aunque el contenido apenas cambie.',
      action:'Revisa las cabeceras de caché de CSS/JS (Cache-Control/Expires con vida larga) y si usas un sistema de versionado que cambia el parámetro en cada actualización, valora fijar la versión o usar hash de contenido en vez de la versión del plugin.',
      risk:'Cada petición que Googlebot gasta en CSS/JS repetido es una petición menos disponible para rastrear HTML nuevo o actualizado — con presupuesto de rastreo limitado, esto ralentiza cuánto tarda tu contenido nuevo en aparecer en el índice.'});
  }
  // REGLA 17: tiempo de respuesta a Googlebot elevado
  var trendFile17=YM.files['cs_trend'];
  var trendRows17=trendFile17&&trendFile17.sections.length?trendFile17.sections[0].rows:[];
  if(trendRows17.length>=10){
    var avgResp17=trendRows17.reduce(function(a,r){return a+N(r['Tiempo medio de respuesta (ms)']);},0)/trendRows17.length;
    if(avgResp17>=700){
      findings.push({sev:avgResp17>=1200?'warning':'info',area:'Técnico',
        title:'Tu servidor tarda de media '+FMT(avgResp17)+' ms en responder a Googlebot',
        text:'Por encima de ~1 segundo, Google suele reducir cuánto rastrea por sesión para no sobrecargar tu servidor — un tiempo de respuesta alto limita tu presupuesto de rastreo independientemente de cuánto contenido tengas.',
        action:'Revisa TTFB del servidor (caché de página a nivel servidor, no solo de navegador) — el objetivo razonable es bajar de 500ms de media.',
        risk:null});
    }
  }
  // REGLA 18: CTR-gap — páginas en top 10 con impresiones reales y 0 clics (ya visible en la tabla por URL, aquí se eleva a hallazgo del plan de acción)
  var ctrGap18=htmlRows.filter(function(r){return N(r['Posición'])>0&&N(r['Posición'])<=10&&N(r['Impresiones'])>=30&&N(r['Clics'])===0;})
    .sort(function(a,b){return N(b['Impresiones'])-N(a['Impresiones']);});
  if(ctrGap18.length){
    var top18=ctrGap18.slice(0,3).map(function(r){return(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'')+' (pos. '+N(r['Posición']).toFixed(1)+', '+FMT(N(r['Impresiones']))+' impr.)';});
    findings.push({sev:'warning',area:'SEO on-page',
      title:ctrGap18.length+' página(s) en top 10 de Google no consiguen ni un clic',
      text:top18.join(' · ')+'. Todas tienen meta description — el problema no es que falte, es que el título/snippet no convence lo suficiente para hacer clic pese a la buena posición.',
      action:'Reescribe título y meta description de estas URLs con un beneficio o dato concreto que destaque frente al resto de resultados — la posición ya está ganada, falta el clic.',
      risk:'Cada impresión sin clic en top 10 es tráfico ya ganado que se pierde por el snippet, no por el ranking — es de las mejoras más rápidas de aplicar porque no depende de mejorar posición.'});
  }
  return findings;
}
function ymDiagnoseRender(){
  var el=document.getElementById('ymDIAG');
  if(!el)return;
  var findings=ymComputeDiagnosis();
  el.innerHTML=findings.length?findings.map(function(f){
    var cls=f.sev==='critical'?'ym-ar':f.sev==='warning'?'ym-aa':'ym-av';
    var icon=f.sev==='critical'?'🔴':f.sev==='warning'?'🟡':'🔵';
    return'<div class="ym-alert '+cls+'" style="align-items:flex-start;margin-bottom:9px"><span class="ym-ai">'+icon+'</span><div><strong style="display:block;margin-bottom:3px">'+f.title+'</strong><span style="font-size:11px;line-height:1.6;display:block;margin-bottom:5px">'+f.text+'</span><span style="font-size:11px;line-height:1.5;color:var(--ym-lime);font-weight:600;display:block">→ Qué hacer: '+f.action+'</span>'+(f.risk?('<span style="font-size:10px;line-height:1.5;color:var(--ym-amber);display:block;margin-top:4px">⚠ Si no se actúa: '+f.risk+'</span>'):'')+'</div></div>';
  }).join(''):'<div class="ym-cs">Con las fuentes cargadas ahora mismo no encuentro conexiones entre datos que merezcan una alerta compuesta. Cuantas más fuentes distintas subas (log, Screaming Frog, backlinks, Search Console, canales), más cruces puedo hacer — este motor necesita al menos 2 fuentes de "familias" distintas para encontrar algo.</div>';
}
function ymHistPanel(){
  var wrap=document.getElementById('ymHISTChartWrap');
  var tblEl=document.getElementById('ymHISTTable');
  if(!wrap)return;
  var hasCurrent=Object.keys(YM.files).length>0;
  if(!hasCurrent&&!YM.history.length){
    if(YM.charts['ymHISTChart']){try{YM.charts['ymHISTChart'].destroy();}catch(e){}}
    wrap.innerHTML='<canvas id="ymHISTChart"></canvas>';
    tblEl.innerHTML='<div class="ym-cs">Sube tus CSVs para ver al menos la comparativa del período actual, o un PDF histórico para trazar evolución real.</div>';
    return;
  }
  var k=ymComputeKpis();
  var TK='Grupo de canales principal de la sesión (Grupo de canales predeterminado)';
  var hasPrevSection=gD('traffic_acq',TK)[1].length>0;
  var points=YM.history.slice();
  if(hasCurrent&&!points.length&&hasPrevSection){
    points.push({date:'Período anterior (mismo CSV)',sess:k.sessp,leads:k.hasLeadData?k.leadsP:null,er:parseFloat(k.erp)||0,isBaseline:true});
  }
  if(hasCurrent){
    points.push({date:new Date().toISOString().slice(0,10)+' (actual)',sess:k.sess,leads:k.hasLeadData?k.leadsC:null,er:parseFloat(k.er)||0,isCurrent:true});
  }
  if(!wrap.querySelector('canvas'))wrap.innerHTML='<canvas id="ymHISTChart"></canvas>';
  if(points.length<=1){
    if(YM.charts['ymHISTChart']){try{YM.charts['ymHISTChart'].destroy();}catch(e){}}
    var only=points[0];
    tblEl.innerHTML=only?('<div class="ym-cs">Solo tienes una fotografía puntual todavía (tus CSV no traen período anterior y no has subido ningún PDF histórico). Sesiones actuales: <strong style="color:var(--ym-lime)">'+FMT(only.sess)+'</strong>'+(only.leads!==null&&only.leads!==undefined?' · Leads: <strong style="color:var(--ym-lime)">'+FMT(only.leads)+'</strong>':'')+'. Sube un PDF exportado en otro momento (o CSVs con dos períodos) para ver tendencia real.</div>'):'';
    return;
  }
  mkC('ymHISTChart','line',{
    labels:points.map(function(p){return p.date;}),
    datasets:[
      {label:'Sesiones',data:points.map(function(p){return p.sess;}),borderColor:'#b5f23d',backgroundColor:'rgba(181,242,61,.08)',tension:.3,fill:true,pointRadius:3},
      {label:'Leads',data:points.map(function(p){return p.leads;}),borderColor:'#ff6b6b',backgroundColor:'rgba(255,107,107,.06)',tension:.3,fill:false,pointRadius:3,yAxisID:'y1'}
    ]
  },{scales:{y:{ticks:{color:'#7e8aaf'}},y1:{position:'right',ticks:{color:'#7e8aaf'},grid:{display:false}}}});
  var histOnly=points.filter(function(p){return!p.isCurrent;});
  var devHtml='';
  if(histOnly.length>=3&&hasCurrent){
    var vals=histOnly.map(function(p){return p.sess;});
    var mean=vals.reduce(function(a,b){return a+b;},0)/vals.length;
    var variance=vals.reduce(function(a,b){return a+Math.pow(b-mean,2);},0)/vals.length;
    var sd=Math.sqrt(variance);
    var z=sd>0?((k.sess-mean)/sd):0;
    if(Math.abs(z)>=1.5){
      devHtml='<div class="ym-alert '+(z>0?'ym-al':'ym-ar')+'" style="margin-top:10px"><span class="ym-ai">'+(z>0?'🟢':'🔴')+'</span><div><strong>Sesiones actuales fuera de tu rango histórico normal (z='+z.toFixed(2)+')</strong>Tu media de los últimos '+histOnly.length+' períodos registrados es '+FMT(Math.round(mean))+' sesiones (±'+FMT(Math.round(sd))+'). El valor actual ('+FMT(k.sess)+') es una desviación real respecto a tu normalidad histórica, no solo ruido frente al período inmediatamente anterior.</div></div>';
    }
  }else if(histOnly.length&&histOnly.length<3){
    devHtml='<div class="ym-cs" style="margin-top:8px">Con '+histOnly.length+' punto(s) histórico(s) aún no hay suficiente base para calcular desviación estadística fiable (mínimo 3). Sigue subiendo PDFs en cada sesión de trabajo.</div>';
  }
  tblEl.innerHTML=devHtml+'<table class="ym-dt" style="margin-top:10px"><thead><tr><th>Fecha</th><th>Sesiones</th><th>Leads</th><th>Tasa interacción</th></tr></thead><tbody>'+
    points.map(function(p){return'<tr'+(p.isCurrent?' style="font-weight:700;color:var(--ym-lime)"':'')+'><td>'+p.date+'</td><td>'+FMT(p.sess)+'</td><td>'+(p.leads!==null&&p.leads!==undefined?FMT(p.leads):'–')+'</td><td>'+(p.er!==undefined?p.er.toFixed(1)+'%':'–')+'</td></tr>';}).join('')+
    '</tbody></table>';
}
function ymSEOAnalysis(){
  var el=document.getElementById('ymSEOAn');
  if(!el)return;
  var qRows=ymGetQRows(),pageRows=ymGetPageRows();
  var allRows=qRows.length?qRows:pageRows;
  if(!allRows.length){el.innerHTML='';return;}
  var tCl=allRows.reduce(function(a,r){return a+(r.clicks||0);},0);
  var tIm=allRows.reduce(function(a,r){return a+(r.impr||0);},0);
  var avgCTR=tIm>0?(tCl/tIm*100):0;
  var top3=allRows.filter(function(r){return r.pos<=3;}).length;
  var sdz=allRows.filter(function(r){return r.pos>=4&&r.pos<=15;}).length;
  var beyond20=allRows.filter(function(r){return r.pos>20;}).length;
  var sev='info',icon='🔵';
  var parts=[];
  if(avgCTR<1&&tIm>200){sev='warning';icon='🟡';parts.push('Tu CTR medio ('+avgCTR.toFixed(2)+'%) está por debajo del 2% esperable en búsqueda orgánica pese a tener '+FMT(tIm)+' impresiones — hay visibilidad que no se traduce en clics.');}
  else if(tIm>0){parts.push('Tu CTR medio es '+avgCTR.toFixed(2)+'%'+(avgCTR>=2?' (dentro de rango sano).':'.'));}
  parts.push(top3+' de tus '+allRows.length+' consulta(s)/página(s) están en top 3, '+sdz+' en zona de impacto (posición 4-15) y '+beyond20+' más allá de la posición 20.');
  el.innerHTML='<div class="ym-alert '+(sev==='warning'?'ym-aa':'ym-av')+'" style="margin-bottom:13px"><span class="ym-ai">'+icon+'</span><div><strong>Análisis SEO</strong>'+parts.join(' ')+(sdz>0?' <span style="color:var(--ym-lime);font-weight:600">→ Revisa la pestaña Estrategia para ver exactamente cuáles y qué hacer con cada una.</span>':'')+'</div></div>';
}
function ymCanalesAnalysis(){
  var el=document.getElementById('ymCANAn');
  if(!el)return;
  var TK='Grupo de canales principal de la sesión (Grupo de canales predeterminado)';
  var tc=gD('traffic_acq',TK)[0];
  if(!tc.length){el.innerHTML='';return;}
  var totalS=tc.reduce(function(a,r){return a+N(r['Sesiones']);},0);
  var totalEng=tc.reduce(function(a,r){return a+N(r['Sesiones con interacción']);},0);
  var avgRate=totalS?totalEng/totalS*100:0;
  var top=[].concat(tc).sort(function(a,b){return N(b['Sesiones'])-N(a['Sesiones']);})[0];
  var topRate=N(top['Sesiones'])?N(top['Sesiones con interacción'])/N(top['Sesiones'])*100:0;
  var topShare=totalS?N(top['Sesiones'])/totalS*100:0;
  var diff=topRate-avgRate;
  var msg='Tu canal principal es <strong>'+(top[TK]||'')+'</strong> con el '+topShare.toFixed(1)+'% de las sesiones, y su tasa de interacción ('+topRate.toFixed(1)+'%) '+(Math.abs(diff)<3?'está en línea con':diff>0?'está '+diff.toFixed(1)+' puntos por encima de':'está '+Math.abs(diff).toFixed(1)+' puntos por debajo de')+' la media general del sitio ('+avgRate.toFixed(1)+'%).';
  var sev=diff<-5?'warning':'info',icon=diff<-5?'🟡':'🔵';
  if(diff<-5)msg+=' Esto sugiere que el volumen de este canal no es sinónimo de calidad — vale la pena revisar de dónde viene exactamente ese tráfico.';
  el.innerHTML='<div class="ym-alert '+(sev==='warning'?'ym-aa':'ym-av')+'" style="margin-bottom:13px"><span class="ym-ai">'+icon+'</span><div><strong>Análisis de canales</strong>'+msg+'</div></div>';
}
function ymCompAnalysis(){
  var el=document.getElementById('ymCOMPAn');
  if(!el)return;
  var pgInfo=gPages(),pg=pgInfo.rows;
  if(!pg.length){el.innerHTML='';return;}
  var contentPages=pg.filter(function(r){return!ymIsHubPage(pgInfo.key?r[pgInfo.key]:'');});
  var avgTime=contentPages.length?contentPages.reduce(function(a,r){return a+N(r['Tiempo de interacción medio por usuario activo']);},0)/contentPages.length:0;
  var top=[].concat(pg).sort(function(a,b){return N(b['Vistas'])-N(a['Vistas']);})[0];
  var topTime=N(top['Tiempo de interacción medio por usuario activo']);
  var pgName=pgInfo.key?(top[pgInfo.key]||''):'';
  var topIsHub=ymIsHubPage(pgName);
  var msg,sev='info',icon='🔵';
  if(topIsHub){
    var topContent=contentPages.length?[].concat(contentPages).sort(function(a,b){return N(b['Vistas'])-N(a['Vistas']);})[0]:null;
    msg='Tu página más vista es <strong>'+pgName+'</strong>, un hub/índice — es normal que retenga menos (lo esperable si ahí solo enlazas a tus herramientas y posts). '+(topContent?('Tu página de contenido con más tráfico real es <strong>'+(pgInfo.key?topContent[pgInfo.key]:'')+'</strong>, con '+N(topContent['Tiempo de interacción medio por usuario activo']).toFixed(0)+'s de media.'):'Sube más datos para identificar tu mejor página de contenido.');
  }else{
    var diff=topTime-avgTime;
    msg='Tu página más vista es <strong>'+pgName+'</strong> ('+FMT(N(top['Vistas']))+' vistas), y retiene a los usuarios '+topTime.toFixed(0)+'s de media'+(Math.abs(diff)<5?', similar a tus otras páginas de contenido ('+avgTime.toFixed(0)+'s).':diff>0?', '+diff.toFixed(0)+'s más que la media de contenido ('+avgTime.toFixed(0)+'s) — buena señal de contenido enganchando.':', '+Math.abs(diff).toFixed(0)+'s menos que la media de tus páginas de contenido ('+avgTime.toFixed(0)+'s).');
    sev=diff<-5?'warning':'info';icon=diff<-5?'🟡':'🔵';
  }
  el.innerHTML='<div class="ym-alert '+(sev==='warning'?'ym-aa':'ym-av')+'" style="margin-bottom:13px"><span class="ym-ai">'+icon+'</span><div><strong>Análisis de comportamiento</strong>'+msg+'</div></div>';
}
function ymLeadsAnalysis(){
  var el=document.getElementById('ymLEADSAn');
  if(!el)return;
  var k=ymComputeKpis();
  if(!k.hasLeadData){el.innerHTML='';return;}
  var errParsed=ymParseErrorLog();
  var memErr=0;
  if(errParsed){Object.keys(errParsed.counts).forEach(function(key){if(/Allowed memory size/.test(key))memErr+=errParsed.counts[key];});}
  var msg,sev='info',icon='🔵';
  var convChL=ymDeclaredConvChannel();
  if(k.leadsC===0&&memErr>0){
    sev='critical';icon='🔴';
    msg='Tienes 0 leads registrados, y a la vez '+FMT(memErr)+' errores de memoria en tu servidor en el mismo período — antes de tocar el embudo de conversión, confirma que el tracking realmente está funcionando (ver pestaña Rastreo → Salud del servidor).';
  }else if(k.leadsC===0){
    sev='warning';icon='🟡';
    if(convChL){
      msg='Tienes 0 "eventos clave" en GA4 en este período. No hay errores de memoria que lo expliquen — pero recuerda que tu contexto declarado dice que conviertes por '+convChL+', no por formulario. Si no tienes un evento de GA4 configurado para clics en tu enlace de '+convChL+', esto puede ser 0 leads MEDIDOS, no 0 leads REALES. Prioriza configurar ese evento antes de asumir un problema de conversión.';
    }else{
      msg='Tienes 0 leads registrados en este período. No hay errores de memoria que lo expliquen. Antes de revisar el formulario, confirma en la pestaña Anotaciones cuál es tu canal de conversión real (¿formulario, email, LinkedIn?) — sin ese contexto no puedo saber qué revisar exactamente.';
    }
  }else{
    var delta=k.leadsP?((k.leadsC-k.leadsP)/k.leadsP*100):null;
    msg='Tienes '+FMT(k.leadsC)+' leads en este período'+(delta!==null?(delta>=0?', un '+delta.toFixed(1)+'% más que el anterior.':', un '+Math.abs(delta).toFixed(1)+'% menos que el anterior.'):'.');
  }
  el.innerHTML='<div class="ym-alert '+(sev==='critical'?'ym-ar':sev==='warning'?'ym-aa':'ym-av')+'" style="margin-bottom:13px"><span class="ym-ai">'+icon+'</span><div><strong>Análisis de leads</strong>'+msg+'</div></div>';
}
function ymPriorityPanel(){
  var el=document.getElementById('ymPRIO');
  if(!el)return;
  var findings=ymComputeDiagnosis();
  if(!findings.length){el.innerHTML='';return;}
  var order={critical:0,warning:1,info:2};
  var top=findings.slice().sort(function(a,b){return order[a.sev]-order[b.sev];}).slice(0,3);
  el.innerHTML='<div class="ym-card" style="margin-bottom:14px;border-left:3px solid var(--ym-coral)"><div class="ym-ct">🎯 Lo más urgente ahora ('+findings.length+' hallazgo'+(findings.length>1?'s':'')+' en total — ver pestaña Diagnóstico)</div>'+
    top.map(function(f,i){var cls=f.sev==='critical'?'ym-ar':f.sev==='warning'?'ym-aa':'ym-av';var icon=f.sev==='critical'?'🔴':f.sev==='warning'?'🟡':'🔵';
      return'<div class="ym-alert '+cls+'" style="margin-top:'+(i>0?'8px':'10px')+'"><span class="ym-ai">'+icon+'</span><div><strong>'+(i+1)+'. '+f.title+'</strong><span style="color:var(--ym-lime);font-weight:600;display:block">→ '+f.action+'</span>'+(f.risk?('<span style="font-size:9px;color:var(--ym-amber);display:block;margin-top:2px">⚠ '+f.risk+'</span>'):'')+'</div></div>';}).join('')+
    '</div>';
}
function ymCrawlHtmlRows(){
  var f=YM.files['crawl_sf'];
  if(!f||!f.sections.length)return[];
  return f.sections[0].rows.filter(function(r){return(r['Tipo de contenido']||'').indexOf('text/html')>-1;});
}
function ymUrlIssues(r){
  var issues=[];
  var title=(r['Título 1']||'').trim();
  var titleLen=N(r['Longitud del título 1']);
  var meta=(r['Meta description 1']||'').trim();
  var metaLen=N(r['Longitud de la meta description 1']);
  var h1=(r['H1-1']||'').trim();
  var h1b=(r['H1-2']||'').trim();
  var words=N(r['Recuento de palabras']);
  var inlinks=N(r['Enlaces internos únicos']);
  var idxStatus=(r['Estado de indexabilidad']||'').trim();
  if(!title)issues.push({code:'title_missing',label:'Sin título',sev:'critical'});
  else if(titleLen>0&&titleLen<30)issues.push({code:'title_short',label:'Título corto ('+titleLen+' car.)',sev:'warning'});
  else if(titleLen>60)issues.push({code:'title_long',label:'Título largo ('+titleLen+' car., se corta)',sev:'warning'});
  if(!meta)issues.push({code:'meta_missing',label:'Sin meta description',sev:'warning'});
  else if(metaLen>0&&metaLen<70)issues.push({code:'meta_short',label:'Meta corta ('+metaLen+' car.)',sev:'info'});
  else if(metaLen>160)issues.push({code:'meta_long',label:'Meta larga ('+metaLen+' car., se corta)',sev:'info'});
  if(!h1)issues.push({code:'h1_missing',label:'Sin H1',sev:'critical'});
  else if(h1b)issues.push({code:'h1_dup',label:'Más de un H1',sev:'warning'});
  if(words>0&&words<300)issues.push({code:'thin',label:'Contenido escaso ('+words+' palabras)',sev:'warning'});
  if(inlinks<3)issues.push({code:'low_inlinks',label:'Pocos enlaces internos ('+inlinks+')',sev:'warning'});
  if(idxStatus)issues.push({code:'indexability',label:idxStatus,sev:'critical'});
  return issues;
}
function ymUrlDiagnosisText(r,issues){
  var impr=N(r['Impresiones']),ctr=N(r['Porcentaje de clics'])*100,pos=N(r['Posición']);
  var titleIssue=issues.some(function(i){return i.code.indexOf('title')===0;});
  var metaIssue=issues.some(function(i){return i.code.indexOf('meta')===0;});
  var thin=issues.some(function(i){return i.code==='thin';});
  var lowLinks=issues.some(function(i){return i.code==='low_inlinks';});
  var idx=issues.some(function(i){return i.code==='indexability';});
  if(idx)return'Problema de indexabilidad — resuelve esto antes que nada, el resto no importa si Google no puede indexarla.';
  if(impr>50&&ctr<1&&pos>0&&pos<=10&&(titleIssue||metaIssue))return'Buena posición ('+pos.toFixed(1)+') pero CTR bajo ('+ctr.toFixed(2)+'%) — el título/meta no genera clics. Reescríbelo.';
  if(impr>50&&ctr<1&&pos>0&&pos<=10)return'Buena posición pero CTR bajo pese a título/meta correctos — revisa si el snippet coincide con la intención real de búsqueda.';
  if(impr>20&&pos>20&&thin)return'Posición pobre ('+pos.toFixed(1)+') y contenido escaso — amplía el contenido antes de tocar el título.';
  if(impr>20&&pos>20&&lowLinks)return'Posición pobre ('+pos.toFixed(1)+') y pocos enlaces internos apoyándola — refuerza el enlazado interno.';
  if(impr>20&&pos>20)return'Posición pobre ('+pos.toFixed(1)+') sin problema técnico evidente — puede necesitar más autoridad externa (backlinks) o mayor profundidad de contenido.';
  if(issues.length)return'Sin problema urgente de rendimiento, pero hay detalles on-page que limpiar.';
  return'—';
}
function ymUrlDiagnosticsPanel(){
  var htmlRows=ymCrawlHtmlRows();
  var elDiag=document.getElementById('ymOT'),elLink=document.getElementById('ymILK'),elOff=document.getElementById('ymOFF');
  if(!elDiag)return;
  if(!htmlRows.length){
    var msg='<div class="ym-cs">Sube el rastreo completo de Screaming Frog (con Search Console conectado) para diagnóstico por URL: título, meta, H1, contenido, enlaces internos e indexabilidad cruzados con clics/posición reales.</div>';
    elDiag.innerHTML=msg;if(elLink)elLink.innerHTML=msg;if(elOff)elOff.innerHTML=msg;
    return;
  }
  var withInterest=htmlRows.filter(function(r){return N(r['Clics'])>0||N(r['Impresiones'])>0;});
  var allDiag=withInterest.map(function(r){return{r:r,issues:ymUrlIssues(r)};}).filter(function(x){return x.issues.length>0;})
    .sort(function(a,b){return N(b.r['Impresiones'])-N(a.r['Impresiones']);});
  var CAP=40;
  var diagRows=allDiag.slice(0,CAP);
  var coverNote=allDiag.length>CAP?('<div class="ym-cs" style="margin-bottom:6px">Mostrando '+CAP+' de '+allDiag.length+' URLs con problemas detectados, ordenadas por impresiones — ninguna se excluye del Plan de Acción por no aparecer aquí.</div>'):'';
  elDiag.innerHTML=!diagRows.length?'<div class="ym-cs">Ninguna página con interés de búsqueda tiene problemas on-page detectables — buena señal.</div>':
    coverNote+'<table class="ym-dt"><thead><tr><th>Página</th><th>Clics</th><th>Pos.</th><th>Problemas</th><th>Por qué / Qué hacer</th></tr></thead><tbody>'+
    diagRows.map(function(x){var r=x.r;var pos=N(r['Posición']);var pc=pos<=3?'ym-pca':pos<=10?'ym-pcb':'ym-pcc';var diag=ymUrlDiagnosisText(r,x.issues);
      return'<tr><td><span class="ym-mono" style="font-size:9px">'+(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'').substring(0,26)+'</span></td><td>'+N(r['Clics'])+'</td><td><span class="'+pc+'">'+pos.toFixed(1)+'</span></td><td>'+x.issues.slice(0,3).map(function(i){return'<span class="ym-pill '+(i.sev==='critical'?'ym-pr':i.sev==='warning'?'ym-pa':'ym-pl')+'" style="margin:1px;display:inline-block">'+i.label+'</span>';}).join('')+'</td><td style="font-size:9px;color:var(--ym-t2)">'+diag+'</td></tr>';
    }).join('')+'</tbody></table>';
  if(elLink){
    var underlinkedAll=withInterest.filter(function(r){return N(r['Enlaces internos únicos'])<5;}).sort(function(a,b){return N(b['Impresiones'])-N(a['Impresiones']);});
    var underlinked=underlinkedAll.slice(0,CAP);
    var linkNote=underlinkedAll.length>CAP?('<div class="ym-cs" style="margin-bottom:6px">Mostrando '+CAP+' de '+underlinkedAll.length+'.</div>'):'';
    elLink.innerHTML=!underlinked.length?'<div class="ym-cs">Ninguna página con interés de búsqueda tiene pocos enlaces internos.</div>':
      linkNote+'<table class="ym-dt"><thead><tr><th>Página</th><th>Impr.</th><th>Enlaces internos</th><th>Qué hacer</th></tr></thead><tbody>'+
      underlinked.map(function(r){var links=N(r['Enlaces internos únicos']);return'<tr><td><span class="ym-mono" style="font-size:9px">'+(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'').substring(0,26)+'</span></td><td>'+FMT(N(r['Impresiones']))+'</td><td style="color:'+(links<3?'var(--ym-coral)':'var(--ym-amber)')+'">'+links+'</td><td style="font-size:9px;color:var(--ym-t2)">Añade 2-3 enlaces internos desde páginas relacionadas de tu propio contenido.</td></tr>';}).join('')+'</tbody></table>';
  }
  if(elOff){
    var bkRows=gR('backlinks','Página de destino');
    var bkMap={};
    bkRows.forEach(function(b){var p=(b['Página de destino']||'').replace(/^https?:\/\/[^\/]+/,'');bkMap[p]=N(b['Enlaces entrantes']);});
    var offAll=htmlRows.filter(function(r){var pos=N(r['Posición']);return pos>0&&pos<=20&&N(r['Impresiones'])>50;}).map(function(r){
      var path=(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'');
      return{path:path,pos:N(r['Posición']),impr:N(r['Impresiones']),bk:bkMap[path]||0};
    }).filter(function(x){return x.bk<2;}).sort(function(a,b){return b.impr-a.impr;});
    var offCandidates=offAll.slice(0,CAP);
    var offNote=offAll.length>CAP?('<div class="ym-cs" style="margin-bottom:6px">Mostrando '+CAP+' de '+offAll.length+'.</div>'):'';
    elOff.innerHTML=!bkRows.length?'<div class="ym-cs">Sube el CSV de Backlinks (Enlaces: páginas de destino) de Search Console para ver esta priorización.</div>':
      (!offCandidates.length?'<div class="ym-cs">Ninguna página con buena posición tiene déficit claro de backlinks.</div>':
      offNote+'<table class="ym-dt"><thead><tr><th>Página</th><th>Pos.</th><th>Impr.</th><th>Backlinks</th><th>Qué hacer</th></tr></thead><tbody>'+
      offCandidates.map(function(x){var pc=x.pos<=3?'ym-pca':x.pos<=10?'ym-pcb':'ym-pcc';return'<tr><td><span class="ym-mono" style="font-size:9px">'+x.path.substring(0,26)+'</span></td><td><span class="'+pc+'">'+x.pos.toFixed(1)+'</span></td><td>'+FMT(x.impr)+'</td><td style="color:var(--ym-coral)">'+x.bk+'</td><td style="font-size:9px;color:var(--ym-t2)">Buena base de contenido — prioriza conseguir enlaces externos hacia esta página.</td></tr>';}).join('')+'</tbody></table>');
  }
}
function ymHealthStrip(){
  var el=document.getElementById('ymHEALTH');
  if(!el)return;
  var items=[];
  var qRowsH=ymGetQRows(),pageRowsH=ymGetPageRows();
  var allH=qRowsH.length?qRowsH:pageRowsH;
  if(allH.length){
    var tClH=allH.reduce(function(a,r){return a+(r.clicks||0);},0),tImH=allH.reduce(function(a,r){return a+(r.impr||0);},0);
    var avgCTRH=tImH>0?(tClH/tImH*100):0;
    items.push({name:'SEO',sev:(avgCTRH<1&&tImH>200)?'warning':'good'});
  }else items.push({name:'SEO',sev:'none'});
  var TKh='Grupo de canales principal de la sesión (Grupo de canales predeterminado)';
  var tcH=gD('traffic_acq',TKh)[0];
  if(tcH.length){
    var totalSH=tcH.reduce(function(a,r){return a+N(r['Sesiones']);},0);
    var totalEngH=tcH.reduce(function(a,r){return a+N(r['Sesiones con interacción']);},0);
    var avgRateH=totalSH?totalEngH/totalSH*100:0;
    var topH=[].concat(tcH).sort(function(a,b){return N(b['Sesiones'])-N(a['Sesiones']);})[0];
    var topRateH=N(topH['Sesiones'])?N(topH['Sesiones con interacción'])/N(topH['Sesiones'])*100:0;
    items.push({name:'Canales',sev:(topRateH-avgRateH<-5)?'warning':'good'});
  }else items.push({name:'Canales',sev:'none'});
  var pgInfoH=gPages();
  if(pgInfoH.rows.length){
    var avgViewsH=pgInfoH.rows.reduce(function(a,r){return a+N(r['Vistas']);},0)/pgInfoH.rows.length;
    var avgTimeH=pgInfoH.rows.reduce(function(a,r){return a+N(r['Tiempo de interacción medio por usuario activo']);},0)/pgInfoH.rows.length;
    var topPH=[].concat(pgInfoH.rows).sort(function(a,b){return N(b['Vistas'])-N(a['Vistas']);})[0];
    var badBehav=topPH&&N(topPH['Vistas'])>avgViewsH*1.5&&N(topPH['Tiempo de interacción medio por usuario activo'])<avgTimeH*0.5;
    items.push({name:'Comportamiento',sev:badBehav?'warning':'good'});
  }else items.push({name:'Comportamiento',sev:'none'});
  var kH=ymComputeKpis();
  if(kH.hasLeadData){
    items.push({name:'Leads',sev:kH.leadsC===0?'critical':'good'});
  }else items.push({name:'Leads',sev:'none'});
  var errH=ymParseErrorLog();
  if(errH){
    items.push({name:'Técnico',sev:errH.totalFatal>500?'critical':errH.totalFatal>50?'warning':'good'});
  }else items.push({name:'Técnico',sev:'none'});
  var ctxH=ymPatientContext();
  items.push({name:'Contexto',sev:(ctxH.goals.length||ctxH.context.length)?'good':'warning'});
  var iconMap={critical:'🔴',warning:'🟡',good:'🟢',none:'⚪'};
  el.innerHTML='<div class="ym-card" style="margin-bottom:14px"><div class="ym-ct" style="margin-bottom:10px">🩺 Radiografía rápida por área</div><div style="display:flex;gap:12px;flex-wrap:wrap">'+
    items.map(function(it){return'<div style="display:flex;align-items:center;gap:6px;background:var(--ym-lifted);padding:8px 12px;border-radius:8px"><span style="font-size:16px">'+iconMap[it.sev]+'</span><span style="font-size:11px;font-weight:600">'+it.name+'</span></div>';}).join('')+
    '</div>'+(items.find(function(i){return i.name==='Contexto'&&i.sev==='warning';})?'<div class="ym-cs" style="margin-top:10px">⚠️ Sin objetivo/contexto declarado en Anotaciones — el diagnóstico puede estar asumiendo cosas sobre tu embudo que no son ciertas. <a href="#" onclick="ymTab(\'ann\',document.querySelector(\'[onclick*=ann]\'));return false;" style="color:var(--ym-lime)">Añádelo aquí →</a></div>':'')+
    '</div>';
}
function ymRoadmapPanel(){
  var el=document.getElementById('ymROADMAP');
  if(!el)return;
  var ctx=ymPatientContext();
  var diag=ymComputeDiagnosis();
  var critCount=diag.filter(function(f){return f.sev==='critical';}).length;
  var warnCount=diag.filter(function(f){return f.sev==='warning';}).length;
  var phases=[{key:'high',label:'Esta semana',color:'var(--ym-coral)'},{key:'med',label:'Este mes',color:'var(--ym-amber)'},{key:'low',label:'Próximo trimestre',color:'var(--ym-t3)'}];
  var byPhase={};
  YM.actions.forEach(function(a){(byPhase[a.p]=byPhase[a.p]||[]).push(a);});
  var prognosis='';
  if(critCount>0)prognosis='Tienes '+critCount+' hallazgo(s) crítico(s) activos. Hasta que se resuelvan, es razonable esperar que el resto de esfuerzo (contenido, SEO, difusión) rinda por debajo de su potencial real — no es que no esté funcionando, es que hay fugas técnicas por delante tapando el resultado.';
  else if(warnCount>0)prognosis='Sin hallazgos críticos activos — lo que tienes pendiente son mejoras de rendimiento (Esta semana/Este mes), no fugas urgentes. Completarlas debería traducirse en mejoras progresivas de visibilidad y conversión, no en un cambio brusco de un día para otro.';
  else prognosis='Sin hallazgos relevantes pendientes con las fuentes actuales — buen momento para centrarte en las acciones de "Próximo trimestre" (crecimiento) en vez de en apagar fuegos.';
  el.innerHTML='<div class="ym-card" style="border-left:3px solid var(--ym-violet)">'+
    '<div class="ym-ct" style="margin-bottom:8px">🗺️ Hoja de ruta</div>'+
    (ctx.goals.length?'<div class="ym-cs" style="margin-bottom:12px"><strong style="color:var(--ym-lime)">Objetivo: </strong>'+ctx.goals.map(function(a){return a.text;}).join(' · ')+'</div>':'<div class="ym-cs" style="margin-bottom:12px">Sin objetivo declarado — añade uno en Anotaciones para que esta hoja de ruta apunte a algo concreto, no solo a "arreglar cosas".</div>')+
    '<div class="ym-g3">'+
    phases.map(function(ph){var items=byPhase[ph.key]||[];
      return'<div><div style="font-size:10px;font-weight:800;letter-spacing:.5px;color:'+ph.color+';text-transform:uppercase;margin-bottom:6px">'+ph.label+' ('+items.length+')</div>'+
        (items.length?items.slice(0,6).map(function(a){return'<div style="font-size:10px;color:var(--ym-t2);padding:5px 0;border-bottom:1px solid var(--ym-rim2)">'+a.t+'</div>';}).join(''):'<div style="font-size:10px;color:var(--ym-t3)">Nada pendiente aquí.</div>')+
        (items.length>6?'<div style="font-size:9px;color:var(--ym-t3);margin-top:4px">+'+(items.length-6)+' más en Plan de acción</div>':'')+
      '</div>';
    }).join('')+
    '</div>'+
    '<div class="ym-cs" style="margin-top:12px;padding-top:10px;border-top:1px solid var(--ym-rim2)"><strong style="color:var(--ym-amber)">📈 Pronóstico: </strong>'+prognosis+'</div>'+
    '</div>';
}
function ymKwSignificantWords(kw){
  var stop=['de','la','el','en','y','a','los','las','un','una','del','que','para','con','como','es','su','al','o','tu','mi','este','esta'];
  return(kw||'').toLowerCase().split(/\s+/).filter(function(w){return w.length>2&&stop.indexOf(w)===-1;});
}
function ymKwType(kw){
  var t=(kw||'').toLowerCase();
  if(/\b(comprar|precio|precios|contratar|presupuesto|cotizar|gratis|gratuito|gratuita|descargar|plantilla|herramienta|servicio|contacto)\b/.test(t))return'Transaccional';
  if(/(yel martinez|greentech|rafael solaz)/.test(t))return'Marca';
  if(/\b(qué es|que es|cómo|como|guía|guia|tutorial|ejemplo|significado|diferencia|para qué|para que)\b/.test(t))return'Informacional';
  return'Informacional';
}
function ymKwFindMatch(kw){
  var words=ymKwSignificantWords(kw);
  if(!words.length)return null;
  var htmlRows=ymCrawlHtmlRows();
  if(!htmlRows.length)return null;
  var best=null,bestScore=0;
  htmlRows.forEach(function(r){
    var title=(r['Título 1']||'').toLowerCase();
    var h1=(r['H1-1']||'').toLowerCase();
    var score=0;
    words.forEach(function(w){if(title.indexOf(w)>-1)score+=2;if(h1.indexOf(w)>-1)score+=1.5;});
    if(score>bestScore){bestScore=score;best=r;}
  });
  if(!best||bestScore===0)return null;
  var inTitle=words.some(function(w){return(best['Título 1']||'').toLowerCase().indexOf(w)>-1;});
  var inH1=words.some(function(w){return(best['H1-1']||'').toLowerCase().indexOf(w)>-1;});
  return{row:best,score:bestScore,inTitle:inTitle,inH1:inH1,path:(best['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'')};
}
function ymKwEngagement(path){
  var pgInfo=gPages();
  if(!pgInfo.key)return null;
  var row=pgInfo.rows.find(function(r){var p=r[pgInfo.key]||'';return p&&(p.indexOf(path)>-1||path.indexOf(p)>-1);});
  return row?{time:N(row['Tiempo de interacción medio por usuario activo']),ke:N(row['Eventos clave']),views:N(row['Vistas'])}:null;
}
function ymTrackKw(){
  var input=document.getElementById('ymKwAdd');
  var kw=esc((input.value||'').trim());
  if(!kw)return;
  if(YM.trackedKw.indexOf(kw)===-1)YM.trackedKw.push(kw);
  input.value='';
  ymKwWatchRender();ymKwIntelPanel();
}
function ymTrackKwDirect(kw){
  if(YM.trackedKw.indexOf(kw)===-1)YM.trackedKw.push(kw);
  ymKwWatchRender();ymKwIntelPanel();
}
function ymUntrackKw(kw){
  YM.trackedKw=YM.trackedKw.filter(function(k){return k!==kw;});
  ymKwWatchRender();ymKwIntelPanel();
}
function ymKwPrevReading(kw){
  for(var i=YM.history.length-1;i>=0;i--){
    var arr=YM.history[i].trackedKw;
    if(!Array.isArray(arr))continue;
    var found=arr.find(function(t){return t&&t.kw&&t.kw.toLowerCase()===kw.toLowerCase();});
    if(found&&found.pos!==null&&found.pos!==undefined)return{pos:found.pos,date:YM.history[i].date};
  }
  return null;
}
function ymKwDeltaHtml(kw,curPos){
  var prev=ymKwPrevReading(kw);
  if(!prev)return'<span style="color:var(--ym-t3);font-size:9px">sin lectura anterior</span>';
  var delta=prev.pos-curPos; // positivo = ha mejorado (menos posición = mejor)
  if(Math.abs(delta)<0.1)return'<span style="color:var(--ym-t3);font-size:9px">= sin cambio vs '+prev.date+'</span>';
  return'<span style="font-size:9px;color:'+(delta>0?'var(--ym-lime)':'var(--ym-coral)')+'">'+(delta>0?'▲':'▼')+' '+Math.abs(delta).toFixed(1)+' vs '+prev.date+'</span>';
}
function ymKwWatchRender(){
  var el=document.getElementById('ymKwWatch');
  if(!el)return;
  if(!YM.trackedKw.length){el.innerHTML='<div class="ym-cs">Aún no sigues ninguna keyword. Añádelas arriba, o pulsa la ☆ de cualquier fila en la tabla de abajo.</div>';return;}
  var qRows=ymGetQRows();
  el.innerHTML='<table class="ym-dt"><thead><tr><th>Keyword</th><th>Pos.</th><th>Clics</th><th>Impr.</th><th>CTR</th><th>Comparativa</th><th></th></tr></thead><tbody>'+
    YM.trackedKw.map(function(kw){
      var row=qRows.find(function(r){return(r.name||'').toLowerCase()===kw.toLowerCase();});
      var kwEsc=kw.replace(/'/g,"\\'");
      if(!row)return'<tr><td><span class="ym-mono">'+kw+'</span></td><td colspan="5" style="color:var(--ym-t3)">Sin datos en el período actual</td><td><button class="ym-btndel" onclick="ymUntrackKw(\''+kwEsc+'\')">Quitar</button></td></tr>';
      var pc=row.pos<=3?'ym-pca':row.pos<=10?'ym-pcb':'ym-pcc';
      return'<tr><td><span class="ym-mono">'+kw+'</span></td><td><span class="'+pc+'">'+row.pos.toFixed(1)+'</span></td><td>'+row.clicks+'</td><td>'+FMT(row.impr)+'</td><td>'+row.ctrPct.toFixed(2)+'%</td><td>'+ymKwDeltaHtml(kw,row.pos)+'</td><td><button class="ym-btndel" onclick="ymUntrackKw(\''+kwEsc+'\')">Quitar</button></td></tr>';
    }).join('')+'</tbody></table><div class="ym-cs" style="margin-top:8px">'+(YM.history.length?'Comparando contra tu lectura histórica más reciente de cada keyword (puede venir de distintos PDFs, así que la fecha de comparación varía por keyword).':'Cada PDF que exportes guarda esta lista y sus métricas del momento — al volver a subir un PDF antiguo, este seguimiento empezará a acumular histórico real y podrás ver subidas/bajadas por período, igual que la evolución general del proyecto.')+'</div>';
}
function ymKwIntelPanel(){
  var elIntel=document.getElementById('ymKwIntel'),elGap=document.getElementById('ymKwGap'),elClusters=document.getElementById('ymKwClusters');
  if(!elIntel)return;
  var qRows=ymGetQRows();
  if(!qRows.length){
    var msg='<div class="ym-cs">Sube el CSV de Consultas (Search Console) para ver este análisis.</div>';
    elIntel.innerHTML=msg;if(elGap)elGap.innerHTML=msg;if(elClusters)elClusters.innerHTML=msg;
    return;
  }
  var hasCrawl=ymCrawlHtmlRows().length>0;
  var CAP=40;
  var sorted=[].concat(qRows).sort(function(a,b){return b.impr-a.impr;});
  var show=sorted.slice(0,CAP);
  var note=(sorted.length>CAP?('Mostrando '+CAP+' de '+sorted.length+', ordenadas por impresiones. '):'')+(!hasCrawl?'Sube el rastreo de Screaming Frog para ver coincidencia de contenido e interés real.':'');
  elIntel.innerHTML=(note?'<div class="ym-cs" style="margin-bottom:6px">'+note+'</div>':'')+'<table class="ym-dt"><thead><tr><th></th><th>Keyword</th><th>Tipo</th><th>Pos.</th><th>Impr.</th><th>CTR</th><th>Coincide con</th><th>Interés contenido</th></tr></thead><tbody>'+
    show.map(function(r){
      var type=ymKwType(r.name);
      var match=hasCrawl?ymKwFindMatch(r.name):null;
      var pc=r.pos<=3?'ym-pca':r.pos<=10?'ym-pcb':'ym-pcc';
      var isTracked=YM.trackedKw.indexOf(r.name)>-1;
      var kwEsc=r.name.replace(/'/g,"\\'");
      var matchHtml=!hasCrawl?'—':(match?(match.path.substring(0,24)+' '+(match.inTitle?'<span class="ym-pill ym-pl" style="font-size:7px">título</span>':'')+(match.inH1?'<span class="ym-pill ym-pl" style="font-size:7px">H1</span>':'')):'<span style="color:var(--ym-coral)">sin página</span>');
      var eng=match?ymKwEngagement(match.path):null;
      var engHtml=eng?(eng.time.toFixed(0)+'s'+(eng.ke>0?' · '+eng.ke+' ev.clave':'')):'—';
      return'<tr><td><span style="cursor:pointer;color:'+(isTracked?'var(--ym-lime)':'var(--ym-t3)')+'" onclick="'+(isTracked?'ymUntrackKw':'ymTrackKwDirect')+'(\''+kwEsc+'\')">'+(isTracked?'★':'☆')+'</span></td><td><span class="ym-mono">'+r.name+'</span></td><td style="font-size:9px">'+type+'</td><td><span class="'+pc+'">'+r.pos.toFixed(1)+'</span></td><td>'+FMT(r.impr)+'</td><td>'+r.ctrPct.toFixed(2)+'%</td><td style="font-size:9px">'+matchHtml+'</td><td style="font-size:9px">'+engHtml+'</td></tr>';
    }).join('')+'</tbody></table>';
  if(elGap){
    if(!hasCrawl){elGap.innerHTML='<div class="ym-cs">Sube el rastreo de Screaming Frog para detectar huecos de contenido.</div>';}
    else{
      var gaps=sorted.filter(function(r){return r.impr>=30&&!ymKwFindMatch(r.name);}).slice(0,15);
      elGap.innerHTML=!gaps.length?'<div class="ym-cs">Sin huecos claros — todas tus consultas con volumen tienen alguna página que responde en título o H1.</div>':
        '<table class="ym-dt"><thead><tr><th>Keyword</th><th>Impr.</th><th>Pos.</th></tr></thead><tbody>'+
        gaps.map(function(r){return'<tr><td><span class="ym-mono">'+r.name+'</span></td><td>'+FMT(r.impr)+'</td><td>'+r.pos.toFixed(1)+'</td></tr>';}).join('')+'</tbody></table>'+
        '<div class="ym-cs" style="margin-top:8px">Impresiones reales sin ninguna página que coincida en título/H1 — crea o adapta contenido específico para estas.</div>';
    }
  }
  if(elClusters){
    var used=new Array(sorted.length).fill(false);
    var clusters=[];
    for(var i=0;i<sorted.length;i++){
      if(used[i])continue;
      var wi=ymKwSignificantWords(sorted[i].name);
      if(!wi.length)continue;
      var group=[sorted[i]];
      used[i]=true;
      for(var j=i+1;j<sorted.length;j++){
        if(used[j])continue;
        var wj=ymKwSignificantWords(sorted[j].name);
        var shared=wi.filter(function(w){return wj.indexOf(w)>-1;});
        if(shared.length&&shared.length/Math.min(wi.length,wj.length)>=0.5){group.push(sorted[j]);used[j]=true;}
      }
      if(group.length>=2)clusters.push(group);
    }
    elClusters.innerHTML=!clusters.length?'<div class="ym-cs">Sin clusters claros todavía (hacen falta varias consultas que compartan palabras significativas).</div>':
      clusters.slice(0,8).map(function(g){return'<div class="ym-ichip" style="margin-bottom:6px"><strong style="color:var(--ym-violet-text)">'+g.map(function(r){return r.name;}).join(' · ')+'</strong><br><span style="color:var(--ym-t3);font-size:9px">'+g.length+' consultas relacionadas — candidatas a una única página pilar que las cubra todas.</span></div>';}).join('');
  }
}
function ymAIInit(){
  var el=document.getElementById('ymAISetup');
  var lbl=document.getElementById('ymAILimitLbl');
  var inputEl=document.getElementById('ymAIInput');
  var sendBtn=document.getElementById('ymAISendBtn');
  if(!el)return;
  if(!YM_AI_READY){
    el.innerHTML='<div class="ym-alert ym-aa"><span class="ym-ai">🟡</span><div><strong>Sin clave de IA configurada</strong>Ve a Ajustes → YM Analytics en tu WordPress y añade tu propia clave (Anthropic u OpenAI). Es opcional — todo lo demás de la herramienta funciona igual sin esto.</div></div>';
    if(inputEl){inputEl.disabled=true;inputEl.placeholder='Añade tu clave de IA en Ajustes → YM Analytics para poder chatear';}
    if(sendBtn){sendBtn.disabled=true;sendBtn.style.opacity='.4';sendBtn.style.cursor='not-allowed';}
  }else{
    el.innerHTML='';
    if(inputEl){inputEl.disabled=false;inputEl.placeholder='Pregunta sobre cualquier hallazgo, área o buena práctica SEO...';}
    if(sendBtn){sendBtn.disabled=false;sendBtn.style.opacity='';sendBtn.style.cursor='';}
  }
  if(lbl)lbl.textContent='Límite: '+YM_AI_LIMIT+' peticiones/día en esta instalación.';
}
function ymAIBuildPayload(){
  var k=ymComputeKpis();
  var diag=ymComputeDiagnosis();
  var ctx=ymPatientContext();
  return{
    proyecto:YM.project,
    kpis:{sesiones:k.sess,sesionesAnterior:k.sessp,usuariosNuevos:k.newU,tasaInteraccion:k.er,leads:k.hasLeadData?k.leadsC:null},
    objetivoDeclarado:ctx.goals.map(function(a){return a.text;}),
    contextoOperativo:ctx.context.map(function(a){return a.text;}),
    hallazgos:diag.map(function(f){return{area:f.area,severidad:f.sev,titulo:f.title,detalle:f.text,accionActual:f.action};})
  };
}
function ymAIToggle(){
  var d=document.getElementById('ymAIDrawer');
  if(!d)return;
  var open=d.style.display==='flex';
  d.style.display=open?'none':'flex';
  if(!open){ymAIInit();if(!YM.aiChat.length)ymAIRenderMessages();}
}
function ymAINewChat(){
  YM.aiChat=[];
  document.getElementById('ymAIMessages').innerHTML='';
  var box=document.getElementById('ymAIPreviewBox');if(box)box.style.display='none';
}
function ymAIRenderMessages(){
  var el=document.getElementById('ymAIMessages');
  if(!el)return;
  if(!YM.aiChat.length){
    el.innerHTML='<div class="ym-cs" style="text-align:center;padding:20px 6px">Pregunta lo que quieras sobre tu diagnóstico, tendencias del sector, buenas prácticas SEO, o pide que profundice en cualquier hallazgo. La primera pregunta incluye automáticamente tu diagnóstico actual como contexto.</div>';
    return;
  }
  el.innerHTML=YM.aiChat.map(function(m){
    var isUser=m.role==='user';
    return'<div style="align-self:'+(isUser?'flex-end':'flex-start')+';max-width:88%;background:'+(isUser?'var(--ym-violet-btn)':'var(--ym-lifted)')+';color:'+(isUser?'#fff':'var(--ym-text)')+';padding:8px 11px;border-radius:10px;font-size:11px;line-height:1.5">'+esc(m.displayText||m.content).replace(/\n/g,'<br>')+'</div>';
  }).join('');
  el.scrollTop=el.scrollHeight;
}
function ymAIPreview(){
  var box=document.getElementById('ymAIPreviewBox');
  if(!box)return;
  var visible=box.style.display!=='none';
  if(visible){box.style.display='none';return;}
  box.textContent=YM.aiChat.length?'(ya enviado en el primer mensaje de esta conversación)':JSON.stringify(ymAIBuildPayload(),null,2);
  box.style.display='block';
}
function ymAISend(){
  if(!YM_AI_READY){ymAIInit();return;}
  var input=document.getElementById('ymAIInput');
  var text=(input.value||'').trim();
  if(!text)return;
  var isFirst=YM.aiChat.length===0;
  var contentToSend=text;
  if(isFirst){
    contentToSend='Aquí tienes mi diagnóstico actual calculado por la herramienta (JSON):\n'+JSON.stringify(ymAIBuildPayload())+'\n\nMi pregunta: '+text;
  }
  YM.aiChat.push({role:'user',content:contentToSend,displayText:text});
  input.value='';
  ymAIRenderMessages();
  var msgsEl=document.getElementById('ymAIMessages');
  msgsEl.insertAdjacentHTML('beforeend','<div id="ymAIThinking" style="align-self:flex-start;font-size:11px;color:var(--ym-t3)">Pensando…</div>');
  msgsEl.scrollTop=msgsEl.scrollHeight;
  var body=new URLSearchParams();
  body.append('action','ym_ai_diagnose');
  body.append('nonce',YM_AI_NONCE);
  body.append('messages',JSON.stringify(YM.aiChat.map(function(m){return{role:m.role,content:m.content};})));
  fetch(YM_AI_AJAX,{method:'POST',credentials:'same-origin',body:body})
    .then(function(r){return r.json();})
    .then(function(j){
      var thinking=document.getElementById('ymAIThinking');if(thinking)thinking.remove();
      if(!j||!j.success){
        YM.aiChat.pop();
        var msgsEl2=document.getElementById('ymAIMessages');
        msgsEl2.insertAdjacentHTML('beforeend','<div style="align-self:flex-start;color:var(--ym-coral);font-size:10px">⚠️ '+esc((j&&j.data)?j.data:'Error desconocido')+'</div>');
        return;
      }
      YM.aiChat.push({role:'assistant',content:j.data.text});
      ymAIRenderMessages();
      var lbl=document.getElementById('ymAILimitLbl');
      if(lbl)lbl.textContent='Peticiones restantes hoy: '+j.data.calls_left+' / '+YM_AI_LIMIT;
    })
    .catch(function(err){
      var thinking=document.getElementById('ymAIThinking');if(thinking)thinking.remove();
      YM.aiChat.pop();
      var msgsEl3=document.getElementById('ymAIMessages');
      msgsEl3.insertAdjacentHTML('beforeend','<div style="align-self:flex-start;color:var(--ym-coral);font-size:10px">⚠️ Error de conexión: '+esc(String(err))+'</div>');
    });
}
function ymHostGuide(){
  var sel=document.getElementById('ymHostSel');
  var box=document.getElementById('ymHostGuideBox');
  if(!sel||!box)return;
  var guides={
    raiola:'<strong>Subir memory_limit:</strong> cPanel → Software → "Seleccionar Versión PHP". Si la versión activa pone "Native", cámbiala primero a una versión normal (sin "Native") para poder editar opciones — es un paso obligatorio en Raiola. Luego pulsa <strong>Options</strong> (arriba) y busca <span class="ym-mono">memory_limit</span>.<br><br><strong>Alternativa sin cPanel:</strong> añade en tu <span class="ym-mono">.htaccess</span> la línea <span class="ym-mono">php_value memory_limit 1024M</span>.<br><br><strong>Vaciar el error_log:</strong> Administrador de archivos → localiza <span class="ym-mono">error_log</span> en la raíz → clic derecho → Eliminar (WordPress crea uno nuevo automáticamente).<br><br>Soporte técnico 24/7 disponible si algo no aparece igual.',
    webempresa:'<strong>Subir memory_limit:</strong> cPanel → busca el icono de "Seleccionar Versión PHP" → pulsa el botón <strong>"Opciones de PHP"</strong> (a la izquierda) → localiza <span class="ym-mono">memory_limit</span> y cambia el valor — se guarda automáticamente al modificarlo, sin botón "Aplicar".<br><br><strong>Ver el límite actual sin cambiar nada:</strong> cPanel → Aplicaciones Webempresa → "Configurar PHP".<br><br><strong>Si usas su panel nuevo (WePanel):</strong> WePanel → Herramientas → Parámetros PHP.<br><br><strong>Vaciar el error_log:</strong> Administrador de archivos → localiza <span class="ym-mono">error_log</span> → Eliminar o vaciar contenido.<br><br>Tienen foro de soporte público (webempresa.com/foro) además del ticket privado.',
    banahosting:'<strong>Subir memory_limit</strong> (confirmado, esto es justo lo que ya hiciste tú): cPanel → Software → <strong>"Select PHP Version"</strong> → pestaña <strong>"Options"</strong> arriba → busca <span class="ym-mono">memory_limit</span> en la lista y elige el valor en el desplegable (128M/256M/512M/1024M...) → Aplicar.<br><br><strong>Comprobar que se aplicó de verdad:</strong> sube un <span class="ym-mono">info.php</span> temporal con <span class="ym-mono">&lt;?php phpinfo();</span> y busca "memory_limit" en Local Value y Master Value — bórralo después.<br><br><strong>Vaciar el error_log:</strong> Administrador de archivos → raíz del dominio → localiza <span class="ym-mono">error_log</span> → Eliminar (se regenera solo si vuelve a haber errores).',
    generic:'La mayoría de hostings con cPanel (con CloudLinux) tienen uno de estos dos caminos — prueba el primero:<br><br><strong>Opción A — Select PHP Version:</strong> cPanel → Software → "Select PHP Version" / "Seleccionar Versión PHP" → busca un botón u pestaña "Options"/"Opciones" → localiza <span class="ym-mono">memory_limit</span>.<br><br><strong>Opción B — MultiPHP INI Editor:</strong> cPanel → Software → "MultiPHP INI Editor" → modo Básico → elige tu dominio en el desplegable → localiza <span class="ym-mono">memory_limit</span> → Aplicar.<br><br><strong>Si ninguna aparece:</strong> tu plan puede no tener CloudLinux — escribe a soporte pidiendo literalmente "subir el memory_limit de PHP a 1024M" y que te confirmen dónde queda.<br><br><strong>Vaciar el error_log:</strong> Administrador de archivos → busca <span class="ym-mono">error_log</span> en la raíz de tu dominio → Eliminar.'
  };
  box.innerHTML='<div class="ym-cs" style="line-height:1.7">'+guides[sel.value]+'</div>';
}
function ymVisIndexScore(trackedArr){
  if(!Array.isArray(trackedArr)||!trackedArr.length)return null;
  var sum=0,counted=0;
  trackedArr.forEach(function(t){
    if(!t||t.pos===null||t.pos===undefined||isNaN(t.pos))return;
    var w=t.pos<=1?10:t.pos<=3?7:t.pos<=5?5:t.pos<=10?3:t.pos<=20?1:0.3;
    sum+=w;counted++;
  });
  return counted?sum:null;
}
function ymVisIndexChart(){
  var wrap=document.getElementById('ymVISIndex'),note=document.getElementById('ymVISIndexNote');
  if(!wrap)return;
  var points=YM.history.map(function(h){return{date:h.date,score:ymVisIndexScore(h.trackedKw)};}).filter(function(p){return p.score!==null;});
  if(YM.trackedKw.length){
    var qRows=ymGetQRows();
    var currentTracked=YM.trackedKw.map(function(kw){
      var row=qRows.find(function(r){return(r.name||'').toLowerCase()===kw.toLowerCase();});
      return{kw:kw,pos:row?row.pos:null};
    });
    var curScore=ymVisIndexScore(currentTracked);
    if(curScore!==null)points.push({date:new Date().toISOString().slice(0,10)+' (actual)',score:curScore,isCurrent:true});
  }
  if(points.length<2){
    if(YM.charts['ymVISIndex']){try{YM.charts['ymVISIndex'].destroy();}catch(e){}}
    if(note)note.innerHTML='<div class="ym-cs">Sigue al menos una keyword (pestaña Seguimiento KWs) y exporta/reimporta un PDF en otro momento para empezar a trazar esta evolución — con un único punto no hay curva que dibujar todavía.</div>';
    return;
  }
  mkC('ymVISIndex','line',{
    labels:points.map(function(p){return p.date;}),
    datasets:[{label:'Índice de visibilidad',data:points.map(function(p){return p.score;}),borderColor:'#ff6b6b',backgroundColor:'rgba(255,107,107,.15)',fill:true,tension:.35,pointRadius:4,pointBackgroundColor:'#ff6b6b',pointBorderColor:'#fff',pointBorderWidth:1.5}]
  },{plugins:{legend:{display:false}},scales:{y:{beginAtZero:true,ticks:{color:'#7e8aaf'}}}});
  if(note)note.innerHTML='<div class="ym-cs">Calculado a partir de la posición de tus keywords en seguimiento en cada momento — más peso cuanto mejor la posición. No es comparable con el índice de Sistrix u otras herramientas: es tu propia referencia interna, construida solo con tus datos.</div>';
}
function ymVisibilidadPanel(){
  ymVisIndexChart();
  var elAn=document.getElementById('ymVISAn'),elKpi=document.getElementById('ymVISKPI'),elIdx=document.getElementById('ymVISIDX'),elRob=document.getElementById('ymVISROB'),elApp=document.getElementById('ymVISAPP'),elBk=document.getElementById('ymVISBK');
  if(!elAn)return;
  var htmlRows=ymCrawlHtmlRows();
  if(!htmlRows.length){
    var msg='<div class="ym-cs">Sube el rastreo completo de Screaming Frog para ver indexabilidad y robots. La Aparición en búsquedas y los backlinks funcionan con Search Console aunque no tengas el rastreo.</div>';
    elAn.innerHTML=msg;if(elKpi)elKpi.innerHTML='';if(elIdx)elIdx.innerHTML=msg;if(elRob)elRob.innerHTML=msg;
  }else{
    var indexable=htmlRows.filter(function(r){return(r['Indexabilidad']||'')==='Indexable';});
    var nonIdx=htmlRows.filter(function(r){return(r['Indexabilidad']||'')!=='Indexable';});
    var pct=(indexable.length/htmlRows.length*100);
    var sev=pct<80?'warning':'info',icon=pct<80?'🟡':'🟢';
    elAn.innerHTML='<div class="ym-alert '+(sev==='warning'?'ym-aa':'ym-av')+'"><span class="ym-ai">'+icon+'</span><div><strong>Análisis de visibilidad</strong>De las '+htmlRows.length+' páginas HTML rastreadas, <strong>'+indexable.length+'</strong> ('+pct.toFixed(0)+'%) son indexables por Google y <strong>'+nonIdx.length+'</strong> no lo son (por diseño o por error — revísalas abajo).'+(pct<80?' Un '+(100-pct).toFixed(0)+'% no indexable es un porcentaje alto; confirma que todas esas exclusiones son intencionadas.':'')+'</div></div>';
    if(elKpi)elKpi.innerHTML=
      '<div class="ym-kcard ym-lime"><div class="ym-klbl">Indexables</div><div class="ym-kval">'+indexable.length+'</div><div class="ym-kdelta">de '+htmlRows.length+' páginas HTML</div></div>'+
      '<div class="ym-kcard ym-coral"><div class="ym-klbl">No indexables</div><div class="ym-kval">'+nonIdx.length+'</div><div class="ym-kdelta">'+(nonIdx.length?'revisar si es intencionado':'ninguna, buena señal')+'</div></div>'+
      '<div class="ym-kcard ym-amber"><div class="ym-klbl">Con noindex explícito</div><div class="ym-kval">'+htmlRows.filter(function(r){return/noindex/i.test(r['Meta robots 1']||'');}).length+'</div><div class="ym-kdelta">en meta robots</div></div>';
    if(elIdx){
      elIdx.innerHTML=!nonIdx.length?'<div class="ym-cs">Ninguna página no indexable detectada — bien.</div>':
        '<table class="ym-dt"><thead><tr><th>Página</th><th>Estado</th><th>Qué hacer</th></tr></thead><tbody>'+
        nonIdx.slice(0,20).map(function(r){var st=r['Estado de indexabilidad']||'';var act=st==='Redirigido'?'Actualiza el sitemap/enlaces internos para que apunten al destino final, no a esta URL.':st==='noindex'?'Si es intencionado (página de utilidad, no de contenido) déjalo. Si no, quita la etiqueta noindex.':'Revisa el motivo — código de respuesta o directiva bloqueándola.';
          return'<tr><td><span class="ym-mono" style="font-size:9px">'+(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'').substring(0,32)+'</span></td><td style="color:var(--ym-coral)">'+st+'</td><td style="font-size:9px;color:var(--ym-t2)">'+act+'</td></tr>';}).join('')+'</tbody></table>';
    }
    if(elRob){
      var withRobots=htmlRows.filter(function(r){return(r['Meta robots 1']||'').trim()!=='';});
      elRob.innerHTML=!withRobots.length?'<div class="ym-cs">Ninguna página trae meta robots explícito (comportamiento por defecto: index, follow).</div>':
        '<table class="ym-dt"><thead><tr><th>Página</th><th>Meta robots</th></tr></thead><tbody>'+
        withRobots.slice(0,15).map(function(r){var mr=r['Meta robots 1']||'';var bad=/noindex|nofollow/i.test(mr);return'<tr><td><span class="ym-mono" style="font-size:9px">'+(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,'').substring(0,28)+'</span></td><td style="font-size:9px;color:'+(bad?'var(--ym-coral)':'var(--ym-t2)')+'">'+mr+'</td></tr>';}).join('')+'</tbody></table>'+
        '<div class="ym-cs" style="margin-top:6px">Nota: este rastreo no incluyó la columna de canonical — si quieres detectar canonicals mal apuntados, actívala en Screaming Frog (pestaña Canonicals) en el próximo rastreo.</div>';
    }
  }
  if(elApp){
    var appRows=gSC('sc_appearance');
    elApp.innerHTML=!appRows.length?'<div class="ym-cs">Sube "Aparición en búsquedas" (Search Console) para ver en qué formatos aparece tu web: resultado normal, fragmento destacado, imagen, vídeo, etc.</div>':
      '<table class="ym-dt"><thead><tr><th>Tipo de aparición</th><th>Clics</th><th>Impr.</th><th>CTR</th><th>Pos.</th></tr></thead><tbody>'+
      appRows.sort(function(a,b){return b.impr-a.impr;}).map(function(r){return'<tr><td>'+r.name+'</td><td>'+r.clicks+'</td><td>'+FMT(r.impr)+'</td><td>'+r.ctr.toFixed(2)+'%</td><td>'+r.pos.toFixed(1)+'</td></tr>';}).join('')+'</tbody></table>';
  }
  if(elBk){
    var bkRows=gR('backlinks','Página de destino');
    elBk.innerHTML=!bkRows.length?'<div class="ym-cs">Sube el CSV de Backlinks (Enlaces: páginas de destino) de Search Console.</div>':
      '<div class="ym-cs" style="margin-bottom:8px">'+bkRows.length+' página(s) con al menos un enlace entrante detectado. Tu visibilidad externa está concentrada en pocas páginas si la lista de abajo es corta comparada con tu número total de páginas — señal de que el resto depende solo de tu SEO on-page, sin refuerzo externo.</div>'+
      '<table class="ym-dt"><thead><tr><th>Página</th><th>Enlaces entrantes</th><th>Sitios</th></tr></thead><tbody>'+
      [].concat(bkRows).sort(function(a,b){return N(b['Enlaces entrantes'])-N(a['Enlaces entrantes']);}).slice(0,10).map(function(r){return'<tr><td><span class="ym-mono" style="font-size:9px">'+(r['Página de destino']||'').replace(/^https?:\/\/[^\/]+/,'').substring(0,30)+'</span></td><td>'+N(r['Enlaces entrantes'])+'</td><td>'+N(r['Sitios web con enlaces'])+'</td></tr>';}).join('')+'</tbody></table>';
  }
}
function ymBuildActions(){
  var prevDone={};
  YM.actions.forEach(function(a){prevDone[a.t]=a.done;});
  var fresh=[],idc=1;
  ymComputeAlerts().filter(function(a){return a.level==='critical'||a.level==='warning';}).forEach(function(a){
    fresh.push({id:idc++,done:!!prevDone[a.title],a:a.level==='critical'?'Técnico':'Optimización',p:a.level==='critical'?'high':'med',t:a.title,m:a.text,f:'Revisar y corregir según la alerta.'});
  });
  ymComputeDiagnosis().forEach(function(d){
    fresh.push({id:idc++,done:!!prevDone[d.title],a:d.area||'General',p:d.sev==='critical'?'high':d.sev==='warning'?'med':'low',t:d.title,m:d.text,f:d.action});
  });
  if(!fresh.length){
    fresh=[{id:1,done:false,a:'General',p:'low',t:'Sube tus CSVs de GA4 y Search Console',m:'Detectar oportunidades automáticamente a partir de tus propios datos',f:'Arrastra los archivos exportados desde GA4/Search Console en la barra lateral.'}];
  }
  YM.actions=fresh;
}
function ymRenderActions(){
  document.getElementById('ymAB').innerHTML=YM.actions.map(function(a){
    var pc=a.p==='high'?'ym-pr':a.p==='med'?'ym-pa':'ym-pl';
    var pl=a.p==='high'?'ALTA':a.p==='med'?'MEDIA':'BAJA';
    var plazo=a.p==='high'?'Esta semana':a.p==='med'?'Este mes':'Cuando puedas';
    return'<tr class="'+(a.done?'done':'')+'"><td><button class="ym-chk '+(a.done?'done':'')+'" onclick="ymTogAct('+a.id+')"></button></td>'+
      '<td><span class="ym-atxt">'+a.t+'</span></td>'+
      '<td><span class="ym-pill ym-pv">'+a.a+'</span></td>'+
      '<td><span class="ym-pill '+pc+'">'+pl+'</span></td>'+
      '<td style="font-size:10px;font-weight:700;color:'+(a.p==='high'?'var(--ym-coral)':a.p==='med'?'var(--ym-amber)':'var(--ym-t3)')+'">'+plazo+'</td>'+
      '<td style="font-size:10px;color:var(--ym-t3);max-width:170px">'+a.m+'</td>'+
      '<td style="font-size:10px;color:var(--ym-lime);font-weight:600;max-width:220px">'+a.f+'</td></tr>';
  }).join('');
}
function ymTogAct(id){var a=YM.actions.find(function(x){return x.id===id;});if(a){a.done=!a.done;ymRenderActions();}}

function ymAddAnn(){
  var txt=document.getElementById('ymATX').value.trim();if(!txt)return;
  YM.annotations.unshift({id:Date.now(),date:document.getElementById('ymAD').value||new Date().toISOString().slice(0,10),type:document.getElementById('ymAT').value,text:esc(txt)});
  ymRenderAnns();ymCtx();document.getElementById('ymATX').value='';
}
function ymDelAnn(id){YM.annotations=YM.annotations.filter(function(a){return a.id!==id;});ymRenderAnns();ymCtx();}
function ymPatientContext(){
  return{
    goals:YM.annotations.filter(function(a){return a.type==='goal';}),
    context:YM.annotations.filter(function(a){return a.type==='context';}),
    allText:YM.annotations.map(function(a){return a.text;}).join(' ').toLowerCase()
  };
}
function ymDeclaredConvChannel(){
  var t=ymPatientContext().allText;
  if(/linkedin/.test(t)&&/(email|correo|mail)/.test(t))return'email y LinkedIn';
  if(/linkedin/.test(t))return'LinkedIn';
  if(/(email|correo|mail)/.test(t))return'email';
  return null;
}
function ymPatientCard(){
  var el=document.getElementById('ymPatientCard');
  if(!el)return;
  var ctx=ymPatientContext();
  if(!ctx.goals.length&&!ctx.context.length){
    el.innerHTML='<div class="ym-cs">Aún no has definido ningún 🎯 Objetivo ni 📋 Contexto operativo — añádelos abajo para que el Diagnóstico deje de asumir un embudo genérico (formulario) y use tu situación real.</div>';
    return;
  }
  el.innerHTML='<div class="ym-card" style="border-left:3px solid var(--ym-lime)">'+
    (ctx.goals.length?'<div class="ym-ct" style="margin-bottom:6px">🎯 Objetivo declarado</div>'+ctx.goals.map(function(a){return'<div class="ym-cs" style="margin-bottom:8px">'+a.text+'</div>';}).join(''):'')+
    (ctx.context.length?'<div class="ym-ct" style="margin-bottom:6px;margin-top:8px">📋 Contexto operativo</div>'+ctx.context.map(function(a){return'<div class="ym-cs" style="margin-bottom:8px">'+a.text+'</div>';}).join(''):'')+
    '</div>';
}
function ymRenderAnns(){
  var el=document.getElementById('ymANN');if(!el)return;
  ymPatientCard();
  if(!YM.annotations.length){el.innerHTML='<div style="text-align:center;padding:36px;color:var(--ym-t3)">Sin anotaciones. Añade tu objetivo, tu contexto operativo, y eventos externos que afecten los datos.</div>';return;}
  el.innerHTML=YM.annotations.map(function(a){var m=AM[a.type]||AM.note;return'<div class="ym-annitem"><div class="ym-annmeta"><span class="ym-pill '+m.c+'">'+m.l+'</span><span>'+a.date+'</span><button class="ym-btndel" onclick="ymDelAnn('+a.id+')">Eliminar</button></div><div class="ym-anntxt">'+a.text+'</div></div>';}).join('');
}

function ymPDF(){
  var proj=YM.project||'Proyecto',date=new Date().toLocaleDateString('es-ES',{day:'2-digit',month:'long',year:'numeric'}),analyst=YM.analyst||'Analista';
  var done=YM.actions.filter(function(a){return a.done;}).length,total=YM.actions.length;
  var k=ymComputeKpis();
  function pd(c,p){if(!p)return'<span class="up">–</span>';var v=((c-p)/p*100).toFixed(1);return'<span class="'+(v>0?'up':'dn')+'">'+(v>0?'▲':'▼')+' '+Math.abs(v)+'%</span>';}
  var alerts=ymComputeAlerts();
  var diag=ymComputeDiagnosis();
  var order={critical:0,warning:1,info:2};
  var diagSorted=diag.slice().sort(function(a,b){return order[a.sev]-order[b.sev];});
  var qRowsForHist=ymGetQRows();
  var trackedSnapshot=YM.trackedKw.map(function(kw){
    var row=qRowsForHist.find(function(r){return(r.name||'').toLowerCase()===kw.toLowerCase();});
    return{kw:kw,pos:row?row.pos:null,clicks:row?row.clicks:null,impr:row?row.impr:null};
  });
  var histPayload={
    v:1,date:new Date().toISOString().slice(0,10),proj:proj,
    sess:k.sess,sessP:k.sessp,newU:k.newU,newUP:k.newUp,
    er:parseFloat(k.er)||0,erP:parseFloat(k.erp)||0,
    leads:k.hasLeadData?k.leadsC:null,leadsP:k.hasLeadData?k.leadsP:null,
    alertsCrit:alerts.filter(function(a){return a.level==='critical';}).length,
    alertsWarn:alerts.filter(function(a){return a.level==='warning';}).length,
    trackedKw:trackedSnapshot
  };
  function pdfTable(headers,rows){
    if(!rows.length)return'<p style="font-size:10px;color:#8892b0">Sin datos cargados para esta sección.</p>';
    return'<table><thead><tr>'+headers.map(function(h){return'<th>'+h+'</th>';}).join('')+'</tr></thead><tbody>'+
      rows.map(function(r){return'<tr>'+r.map(function(c){return'<td>'+c+'</td>';}).join('')+'</tr>';}).join('')+'</tbody></table>';
  }
  // --- SEO ---
  var qRowsAll=ymGetQRows().slice().sort(function(a,b){return b.clicks-a.clicks;});
  var htmlRowsPdf=ymCrawlHtmlRows();
  var withInterestPdf=htmlRowsPdf.filter(function(r){return N(r['Clics'])>0||N(r['Impresiones'])>0;});
  var urlDiagPdf=withInterestPdf.map(function(r){return{r:r,issues:ymUrlIssues(r)};}).filter(function(x){return x.issues.length>0;}).sort(function(a,b){return N(b.r['Impresiones'])-N(a.r['Impresiones']);});
  // --- Canales ---
  var TK='Grupo de canales principal de la sesión (Grupo de canales predeterminado)';
  var tcPdf=gD('traffic_acq',TK)[0];
  // --- Comportamiento ---
  var pgInfoPdf=gPages(),pgRowsPdf=pgInfoPdf.rows?[].concat(pgInfoPdf.rows).sort(function(a,b){return N(b['Vistas'])-N(a['Vistas']);}):[];
  // --- Leads ---
  var qbPdf=gLeadsBlocks('Clientes potenciales cualificados'),qCurPdf=qbPdf[0];
  var landingRowsPdf=gR('landing','Página de destino');
  // --- Rastreo ---
  var errParsedPdf=ymParseErrorLog();
  var byPluginPdf=errParsedPdf?Object.keys(errParsedPdf.pluginCounts||{}).map(function(kk){return{k:kk,n:errParsedPdf.pluginCounts[kk],last:errParsedPdf.pluginLastDate?errParsedPdf.pluginLastDate[kk]:null};}).sort(function(a,b){return b.n-a.n;}):[];
  var respRowsPdf=(YM.files['cs_responses']||{sections:[]}).sections[0];respRowsPdf=respRowsPdf?respRowsPdf.rows:[];
  var bkRowsPdf=gR('backlinks','Página de destino');

  var w=window.open('','_blank');
  w.document.write('<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Analytics · '+proj+'</title>'+
  '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">'+
  '<style>*{box-sizing:border-box;margin:0;padding:0}body{font-family:"Inter",sans-serif;font-size:12px;color:#1a1a2e;background:#fff;line-height:1.6}.page{max-width:840px;margin:0 auto;padding:40px 32px}.cover{background:linear-gradient(135deg,#0d0f18,#181c2e);border-radius:12px;padding:40px;margin-bottom:32px;color:#fff;min-height:220px;display:flex;flex-direction:column;justify-content:space-between}.cover-sig{font-size:10px;letter-spacing:3px;text-transform:uppercase;opacity:.5;margin-bottom:7px}.cover-title{font-family:"Space Grotesk",sans-serif;font-size:38px;font-weight:700;line-height:1.05;letter-spacing:-1.5px}.cover-title span{color:#b5f23d}.cover-sub{font-size:12px;opacity:.6;margin-top:5px}.cover-bot{display:flex;justify-content:space-between;font-size:10px;opacity:.5;margin-top:18px}h2{font-family:"Space Grotesk",sans-serif;font-size:15px;font-weight:700;margin:26px 0 9px;padding-bottom:5px;border-bottom:2px solid #f0f0f5}h3{font-size:11px;font-weight:700;margin:14px 0 6px;color:#4a5568}.kpis{display:grid;grid-template-columns:repeat(4,1fr);gap:9px;margin-bottom:22px}.kpi{background:#f8f9fc;border:1px solid #e8eaf0;border-radius:9px;padding:11px;border-top:3px solid}.kpi-l{font-size:8px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:#8892b0}.kpi-v{font-family:"Space Grotesk",sans-serif;font-size:22px;font-weight:700;letter-spacing:-.5px;margin:3px 0}.kpi-d{font-size:9px;font-weight:600}.up{color:#22c55e}.dn{color:#ef4444}.al{border-radius:6px;padding:8px 11px;margin-bottom:6px;border-left:3px solid;font-size:11px}.al strong{display:block;font-weight:700;margin-bottom:1px}.al .act{color:#16a34a;font-weight:600;display:block;margin-top:3px}.ar{background:#fff5f5;border-color:#ef4444}.aa{background:#fffbeb;border-color:#f59e0b}.ag{background:#f0fdf4;border-color:#22c55e}.av{background:#f5f3ff;border-color:#7c3aed}table{width:100%;border-collapse:collapse;font-size:9.5px;margin-bottom:16px}th{text-align:left;padding:5px 7px;background:#f8f9fc;font-size:8px;text-transform:uppercase;letter-spacing:1px;color:#8892b0;border-bottom:2px solid #e8eaf0}td{padding:5px 7px;border-bottom:1px solid #f0f0f5;vertical-align:top}tr.done td{opacity:.4;text-decoration:line-through}.badge{display:inline-block;padding:1px 5px;border-radius:3px;font-size:8px;font-weight:700}.br{background:#fee2e2;color:#ef4444}.ba{background:#fef3c7;color:#d97706}.bg{background:#dcfce7;color:#16a34a}.bv{background:#ede9fe;color:#7c3aed}.footer{margin-top:40px;padding-top:12px;border-top:1px solid #e8eaf0;display:flex;justify-content:space-between;font-size:9px;color:#8892b0}@media print{.page{padding:18px}.cover{-webkit-print-color-adjust:exact;print-color-adjust:exact}h2{page-break-after:avoid}table{page-break-inside:avoid}}</style></head><body><div class="page">'+
  '<div class="cover"><div><div class="cover-sig">Informe de Análisis Digital — Documento de trabajo completo</div><div class="cover-title">Analytics<br><span>Intelligence</span></div><div class="cover-sub">Proyecto: '+proj+' · '+date+'</div></div><div class="cover-bot"><span>Analista: '+analyst+'</span><span>YM Analytics Intelligence</span></div></div>'+

  '<h2>KPIs</h2>'+
  '<div class="kpis"><div class="kpi" style="border-top-color:#b5f23d"><div class="kpi-l">Sesiones</div><div class="kpi-v">'+FMT(k.sess)+'</div><div class="kpi-d">'+pd(k.sess,k.sessp)+'</div></div><div class="kpi" style="border-top-color:#8b5cf6"><div class="kpi-l">Usuarios nuevos</div><div class="kpi-v">'+FMT(k.newU)+'</div><div class="kpi-d">'+pd(k.newU,k.newUp)+'</div></div><div class="kpi" style="border-top-color:#38bdf8"><div class="kpi-l">Tasa interacción</div><div class="kpi-v">'+k.er+'%</div><div class="kpi-d">'+pd(k.er,k.erp)+'</div></div><div class="kpi" style="border-top-color:#ef4444"><div class="kpi-l">Leads</div><div class="kpi-v">'+(k.hasLeadData?FMT(k.leadsC):'–')+'</div><div class="kpi-d">'+(k.hasLeadData?pd(k.leadsC,k.leadsP):'sin datos')+'</div></div></div>'+

  '<h2>🎯 Lo más urgente ahora</h2>'+
  (diagSorted.length?diagSorted.slice(0,3).map(function(f,i){var cls=f.sev==='critical'?'ar':f.sev==='warning'?'aa':'av';return'<div class="al '+cls+'"><strong>'+(i+1)+'. '+f.title+'</strong>'+f.text+'<span class="act">→ '+f.action+'</span>'+(f.risk?('<span style="color:#d97706;font-size:9px;display:block;margin-top:2px">⚠ Si no se actúa: '+f.risk+'</span>'):'')+'</div>';}).join(''):'<div class="al av"><strong>Sin hallazgos compuestos todavía</strong>Sube más fuentes para un diagnóstico cruzado.</div>')+

  '<h2>🔬 Diagnóstico completo ('+diag.length+' hallazgo'+(diag.length!==1?'s':'')+')</h2>'+
  (diagSorted.length?diagSorted.map(function(f){var cls=f.sev==='critical'?'ar':f.sev==='warning'?'aa':'av';return'<div class="al '+cls+'"><strong>['+(f.area||'General')+'] '+f.title+'</strong>'+f.text+'<span class="act">→ '+f.action+'</span>'+(f.risk?('<span style="color:#d97706;font-size:9px;display:block;margin-top:2px">⚠ Si no se actúa: '+f.risk+'</span>'):'')+'</div>';}).join(''):'<div class="al av">Sin hallazgos cruzados con las fuentes cargadas actualmente.</div>')+

  '<h2>SEO — Top consultas (todas)</h2>'+
  pdfTable(['Consulta','Clics','Impr.','CTR','Pos.'],qRowsAll.map(function(r){return[r.name||'',r.clicks,FMT(r.impr),r.ctrPct.toFixed(2)+'%',r.pos.toFixed(1)];}))+

  '<h2>SEO — Diagnóstico por URL (todas las páginas con problemas detectados)</h2>'+
  pdfTable(['Página','Clics','Pos.','Problemas','Por qué / Qué hacer'],urlDiagPdf.map(function(x){var r=x.r;return[(r['Dirección']||'').replace(/^https?:\/\/[^\/]+/,''),N(r['Clics']),N(r['Posición']).toFixed(1),x.issues.map(function(i){return i.label;}).join(', '),ymUrlDiagnosisText(r,x.issues)];}))+

  '<h2>Seguimiento de KWs — seguimiento activo</h2>'+
  (YM.trackedKw.length?pdfTable(['Keyword','Pos.','Clics','Impr.'],YM.trackedKw.map(function(kw){var row=qRowsAll.find(function(r){return(r.name||'').toLowerCase()===kw.toLowerCase();});return[kw,row?row.pos.toFixed(1):'—',row?row.clicks:'—',row?FMT(row.impr):'—'];})):'<p style="font-size:10px;color:#8892b0">Sin keywords en seguimiento todavía.</p>')+
  '<h3>Inteligencia de keywords (todas)</h3>'+
  pdfTable(['Keyword','Tipo','Pos.','Impr.','CTR','Coincide con'],qRowsAll.map(function(r){var match=ymKwFindMatch(r.name);return[r.name||'',ymKwType(r.name),r.pos.toFixed(1),FMT(r.impr),r.ctrPct.toFixed(2)+'%',match?match.path.substring(0,30):'sin página'];}))+

  '<h2>Canales — detalle completo</h2>'+
  pdfTable(['Canal','Sesiones','Interacción','Ev. clave'],tcPdf.map(function(r){return[r[TK]||'',FMT(N(r['Sesiones'])),(N(r['Sesiones'])?(N(r['Sesiones con interacción'])/N(r['Sesiones'])*100).toFixed(1):'0')+'%',N(r['Eventos clave'])];}))+

  '<h2>Comportamiento — todas las páginas</h2>'+
  pdfTable(['Página','Vistas','Tiempo'],pgRowsPdf.map(function(r){return[(pgInfoPdf.key?(r[pgInfoPdf.key]||''):''),FMT(N(r['Vistas'])),N(r['Tiempo de interacción medio por usuario activo']).toFixed(0)+'s'];}))+

  '<h2>Leads — desglose completo</h2>'+
  (qCurPdf.length?pdfTable(['Fecha/cohorte','Clientes potenciales cualificados'],qCurPdf.map(function(r){return[r['Día N']||Object.values(r)[0],r['Clientes potenciales cualificados']];})):'<p style="font-size:10px;color:#8892b0">Sin informe "Generar oportunidades de venta" cargado.</p>')+
  '<h3>Leads por página de destino</h3>'+
  pdfTable(['Página','Sesiones','Ev. clave','Tasa'],landingRowsPdf.map(function(r){return[(r['Página de destino']||'').substring(0,40),FMT(N(r['Sesiones'])),N(r['Eventos clave']),(N(r['Tasa de evento clave de sesión'])*100).toFixed(1)+'%'];}))+

  '<h2>Rastreo — salud técnica completa</h2>'+
  (errParsedPdf?('<p style="font-size:10px;margin-bottom:8px">'+FMT(errParsedPdf.totalFatal)+' errores fatales · '+FMT(errParsedPdf.totalWarn)+' avisos · último registro: '+(errParsedPdf.lastDate||'—')+'</p>'+
    '<h3>Por plugin/tema responsable</h3>'+pdfTable(['Origen','Líneas','Fatales','Última vez'],byPluginPdf.map(function(x){return[x.k,FMT(x.n),errParsedPdf.pluginFatal[x.k]||0,x.last||'—'];}))+
    '<h3>Por tipo de mensaje</h3>'+pdfTable(['Tipo','Veces','Qué hacer'],Object.keys(errParsedPdf.counts).map(function(kk){return{k:kk,n:errParsedPdf.counts[kk]};}).sort(function(a,b){return b.n-a.n;}).map(function(x){return[x.k,FMT(x.n),ymErrLogAction(x.k)];}))
    ):'<p style="font-size:10px;color:#8892b0">Sin error_log cargado.</p>')+
  (respRowsPdf.length?('<h3>Códigos de respuesta rastreados</h3>'+pdfTable(['Respuesta','% del rastreo'],respRowsPdf.map(function(r){return[r['Respuesta'],(N((r['Ratio total de solicitudes']||'0').toString().replace(',','.'))*100).toFixed(2)+'%'];}))):'')+
  (bkRowsPdf.length?('<h3>Backlinks — páginas más enlazadas</h3>'+pdfTable(['Página','Enlaces entrantes','Sitios'],bkRowsPdf.map(function(r){return[(r['Página de destino']||'').replace(/^https?:\/\/[^\/]+/,''),N(r['Enlaces entrantes']),N(r['Sitios web con enlaces'])];}))):'')+

  (YM.annotations.length?'<h2>Anotaciones de contexto</h2>'+YM.annotations.map(function(a){return'<div class="al aa"><strong>'+a.date+' — '+(AM[a.type]?AM[a.type].l:a.type)+'</strong>'+a.text+'</div>';}).join(''):'')+

  '<h2>Plan de acción ('+done+'/'+total+' completadas)</h2>'+
  '<table><thead><tr><th>✓</th><th>Acción</th><th>Área</th><th>Prioridad</th><th>Plazo</th><th>Qué hacer</th></tr></thead><tbody>'+
  YM.actions.map(function(a){var plazo=a.p==='high'?'Esta semana':a.p==='med'?'Este mes':'Cuando puedas';return'<tr class="'+(a.done?'done':'')+'"><td>'+(a.done?'✓':'')+'</td><td>'+a.t+'</td><td><span class="badge bv">'+a.a+'</span></td><td><span class="badge '+(a.p==='high'?'br':a.p==='med'?'ba':'bg')+'">'+(a.p==='high'?'ALTA':a.p==='med'?'MEDIA':'BAJA')+'</span></td><td style="font-size:9px;font-weight:700">'+plazo+'</td><td style="color:#16a34a;font-size:9px">'+a.f+'</td></tr>';}).join('')+
  '</tbody></table>'+
  '<div style="font-size:3px;line-height:1;color:#fdfdfe;word-break:break-all;user-select:none">YM_DATA::'+btoa(unescape(encodeURIComponent(JSON.stringify(histPayload))))+'::YMEND</div>'+
  '<div class="footer"><span>'+proj+' · '+analyst+' · '+date+'</span><span>YM Analytics Intelligence</span></div>'+
  '</div><script>window.onload=function(){window.print();};<\/script></body></html>');
  w.document.close();
}


})();
</script>
</div>
<!-- /YM Analytics Intelligence v2.2.0 WP | yelmartinez.com -->
HTML;

    $html = str_replace(
        array('__YM_AJAX_URL__', '__YM_AI_NONCE__', '__YM_AI_READY__', '__YM_AI_LIMIT__'),
        array(
            esc_url(admin_url('admin-ajax.php')),
            wp_create_nonce('ym_ai_nonce'),
            get_option('ym_analytics_ai_key') ? 'true' : 'false',
            intval(get_option('ym_analytics_ai_limit', 10))
        ),
        $html
    );

    return $html;
}

// ---- Cifrado en reposo de la clave de IA, usando AUTH_KEY de este WordPress como base ----
function ym_ai_encrypt($plain) {
    if (empty($plain)) return '';
    if (!defined('AUTH_KEY') || !function_exists('openssl_encrypt')) return base64_encode($plain);
    $key = hash('sha256', AUTH_KEY, true);
    $iv = openssl_random_pseudo_bytes(16);
    $cipher = openssl_encrypt($plain, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    if ($cipher === false) return base64_encode($plain);
    return base64_encode($iv . $cipher);
}
function ym_ai_decrypt($enc) {
    if (empty($enc)) return '';
    if (!defined('AUTH_KEY') || !function_exists('openssl_decrypt')) return base64_decode($enc);
    $raw = base64_decode($enc);
    if ($raw === false || strlen($raw) < 17) return '';
    $iv = substr($raw, 0, 16);
    $cipher = substr($raw, 16);
    $key = hash('sha256', AUTH_KEY, true);
    $plain = openssl_decrypt($cipher, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return $plain === false ? '' : $plain;
}

// ---- Ajustes: IA para diagnóstico avanzado (clave por instancia, nunca compartida) ----
add_action('admin_menu', function () {
    add_options_page('YM Analytics Intelligence', 'YM Analytics', 'manage_options', 'ym-analytics-settings', 'ym_analytics_settings_page');
});
add_action('admin_init', function () {
    register_setting('ym_analytics_settings_group', 'ym_analytics_ai_provider', array('sanitize_callback' => function ($v) {
        return in_array($v, array('anthropic', 'openai'), true) ? $v : 'anthropic';
    }));
    register_setting('ym_analytics_settings_group', 'ym_analytics_ai_key', array('sanitize_callback' => 'ym_analytics_sanitize_ai_key'));
    register_setting('ym_analytics_settings_group', 'ym_analytics_ai_limit', array('sanitize_callback' => function ($v) {
        $v = intval($v);
        return ($v > 0 && $v <= 100) ? $v : 10;
    }));
    register_setting('ym_analytics_settings_group', 'ym_analytics_ai_google_context', array('sanitize_callback' => function ($v) {
        return $v === '1' ? '1' : '';
    }));
});
function ym_analytics_sanitize_ai_key($input) {
    $input = trim((string) $input);
    if (empty($input)) {
        // Campo vacío al guardar = conservar la clave ya guardada, no borrarla por error
        return get_option('ym_analytics_ai_key', '');
    }
    return ym_ai_encrypt($input);
}
function ym_analytics_settings_page() {
    if (!current_user_can('manage_options')) return;
    $has_key = !empty(get_option('ym_analytics_ai_key'));
    ?>
    <div class="wrap">
      <h1>YM Analytics Intelligence — Ajustes</h1>
      <form method="post" action="options.php">
        <?php settings_fields('ym_analytics_settings_group'); ?>
        <table class="form-table">
          <tr>
            <th scope="row"><label for="ym_analytics_ai_provider">Proveedor de IA</label></th>
            <td>
              <select id="ym_analytics_ai_provider" name="ym_analytics_ai_provider">
                <option value="anthropic" <?php selected(get_option('ym_analytics_ai_provider', 'anthropic'), 'anthropic'); ?>>Anthropic (Claude)</option>
                <option value="openai" <?php selected(get_option('ym_analytics_ai_provider', 'anthropic'), 'openai'); ?>>OpenAI (GPT)</option>
              </select>
            </td>
          </tr>
          <tr>
            <th scope="row"><label for="ym_analytics_ai_key">Clave de API</label></th>
            <td>
              <input type="password" id="ym_analytics_ai_key" name="ym_analytics_ai_key" class="regular-text" autocomplete="off"
                     placeholder="<?php echo $has_key ? 'Ya configurada — pega una nueva solo si quieres reemplazarla' : 'Pega tu clave de API aquí'; ?>">
              <p class="description">
                <?php echo $has_key ? '✅ Clave configurada y cifrada en tu base de datos (usando las claves de seguridad de tu propio wp-config.php) — nunca se muestra de nuevo ni se envía al navegador.' : 'Aún no configurada. Esta clave es tuya, solo se usa desde tu servidor y nunca se comparte con otras instalaciones de este plugin.'; ?>
              </p>
            </td>
          </tr>
          <tr>
            <th scope="row"><label for="ym_analytics_ai_limit">Límite de peticiones por sesión de análisis</label></th>
            <td>
              <input type="number" id="ym_analytics_ai_limit" name="ym_analytics_ai_limit" min="1" max="100"
                     value="<?php echo esc_attr(get_option('ym_analytics_ai_limit', 10)); ?>" class="small-text">
              <p class="description">Protege tu saldo de API si algo llama de más por error. Súbelo si lo necesitas, pero mantén un tope.</p>
            </td>
          </tr>
          <tr>
            <th scope="row"><label for="ym_analytics_ai_google_context">Contexto de Google Search Central</label></th>
            <td>
              <label><input type="checkbox" id="ym_analytics_ai_google_context" name="ym_analytics_ai_google_context" value="1" <?php checked(get_option('ym_analytics_ai_google_context'), '1'); ?>> Dar al chatbot acceso a un extracto de la documentación oficial de Google (essentials, guía de inicio SEO, sistemas de ranking)</label>
              <p class="description">Tu servidor descarga solo estas 3 páginas fijas de <code>developers.google.com</code> (nunca URLs a elección del usuario, para evitar riesgos), y las guarda en caché 24h para no repetir la descarga en cada mensaje.</p>
            </td>
          </tr>
        </table>
        <?php submit_button('Guardar'); ?>
      </form>
    </div>
    <?php
}

// ---- Contexto de Google Search Central: SOLO estas 3 URLs fijas, nunca elegidas por el usuario (evita SSRF) ----
function ym_fetch_google_context() {
    $cached = get_transient('ym_google_ctx');
    if ($cached !== false) return $cached;
    $urls = array(
        'https://developers.google.com/search/docs/essentials',
        'https://developers.google.com/search/docs/fundamentals/seo-starter-guide',
        'https://developers.google.com/search/docs/appearance/ranking-systems-guide',
    );
    $ctx = '';
    foreach ($urls as $url) {
        $resp = wp_remote_get($url, array('timeout' => 15, 'headers' => array('User-Agent' => 'YM-Analytics-Plugin/1.0')));
        if (is_wp_error($resp)) continue;
        $body = wp_remote_retrieve_body($resp);
        $text = wp_strip_all_tags($body);
        $text = preg_replace('/\s+/', ' ', $text);
        $ctx .= "\n\n--- Fuente oficial: $url ---\n" . mb_substr(trim($text), 0, 4000);
    }
    set_transient('ym_google_ctx', $ctx, DAY_IN_SECONDS);
    return $ctx;
}

// ---- AJAX: chatbot de IA (conversación con memoria, la clave nunca sale del servidor) ----
add_action('wp_ajax_ym_ai_diagnose', 'ym_ai_diagnose_handler');
function ym_ai_diagnose_handler() {
    check_ajax_referer('ym_ai_nonce', 'nonce');
    if (!current_user_can('manage_options')) {
        wp_send_json_error('No tienes permiso para usar esta función.', 403);
    }
    $enc_key = get_option('ym_analytics_ai_key');
    if (empty($enc_key)) {
        wp_send_json_error('No hay ninguna clave de IA configurada. Ve a Ajustes → YM Analytics.');
    }
    $api_key = ym_ai_decrypt($enc_key);
    if (empty($api_key)) {
        wp_send_json_error('No se pudo leer la clave guardada — vuelve a pegarla en Ajustes.');
    }

    // Capa: límite de peticiones por sesión (usuario + día)
    $limit = intval(get_option('ym_analytics_ai_limit', 10));
    $uid = get_current_user_id();
    $rate_key = 'ym_ai_calls_' . $uid . '_' . gmdate('Y-m-d');
    $calls = intval(get_transient($rate_key));
    if ($calls >= $limit) {
        wp_send_json_error('Has alcanzado el límite de ' . $limit . ' peticiones de IA hoy. Cambia el límite en Ajustes → YM Analytics si necesitas más.');
    }

    // Capa: tamaño máximo de la conversación que se envía (evita mandar CSVs enteros por error)
    $messages_raw = isset($_POST['messages']) ? wp_unslash($_POST['messages']) : '';
    if (strlen($messages_raw) > 40000) {
        wp_send_json_error('La conversación es demasiado larga (máx. 40KB) — pulsa "Nueva conversación" y sigue desde ahí.');
    }
    $messages = json_decode($messages_raw, true);
    if (!is_array($messages) || empty($messages)) {
        wp_send_json_error('Formato de conversación inválido.');
    }
    $clean = array();
    foreach ($messages as $m) {
        if (!isset($m['role']) || !isset($m['content'])) continue;
        $role = ($m['role'] === 'assistant') ? 'assistant' : 'user';
        $content = wp_strip_all_tags((string) $m['content']);
        $content = mb_substr($content, 0, 6000);
        if ($content === '') continue;
        $clean[] = array('role' => $role, 'content' => $content);
    }
    if (empty($clean)) {
        wp_send_json_error('Sin mensajes válidos que enviar.');
    }
    if (count($clean) > 20) $clean = array_slice($clean, -20); // tope de turnos por coste

    $system = "Eres el asistente de IA integrado en YM Analytics Intelligence, un plugin de auditoría SEO/analítica. "
        . "Da consejos breves, concretos y accionables en español. Basa tus respuestas en lo que el usuario ya te haya compartido del diagnóstico de la herramienta (no inventes datos que no tengas). "
        . "Cuando sea relevante, incluye una valoración de riesgo: qué puede empeorar si no se actúa sobre un hallazgo, con una lógica causal razonable (no inventes cifras de predicción exactas, describe la tendencia esperable). "
        . "Si citas una práctica de Google, dilo explícitamente y basa la afirmación en el contexto oficial que se te da a continuación si está disponible.";
    $use_google_ctx = get_option('ym_analytics_ai_google_context') === '1';
    if ($use_google_ctx) {
        $gctx = ym_fetch_google_context();
        if (!empty($gctx)) $system .= "\n\n--- Referencia oficial de Google Search Central (extracto, puede no reflejar cambios muy recientes) ---\n" . $gctx;
    }

    $provider = get_option('ym_analytics_ai_provider', 'anthropic');
    if ($provider === 'openai') {
        $oa_messages = array_merge(array(array('role' => 'system', 'content' => $system)), $clean);
        $resp = wp_remote_post('https://api.openai.com/v1/chat/completions', array(
            'headers' => array('Authorization' => 'Bearer ' . $api_key, 'Content-Type' => 'application/json'),
            'body' => wp_json_encode(array(
                'model' => 'gpt-4o-mini',
                'messages' => $oa_messages,
                'max_tokens' => 900,
            )),
            'timeout' => 45,
        ));
    } else {
        $resp = wp_remote_post('https://api.anthropic.com/v1/messages', array(
            'headers' => array('x-api-key' => $api_key, 'anthropic-version' => '2023-06-01', 'Content-Type' => 'application/json'),
            'body' => wp_json_encode(array(
                'model' => 'claude-sonnet-5',
                'max_tokens' => 900,
                'system' => $system,
                'messages' => $clean,
            )),
            'timeout' => 45,
        ));
    }

    if (is_wp_error($resp)) {
        wp_send_json_error('Error de conexión: ' . $resp->get_error_message());
    }
    $code = wp_remote_retrieve_response_code($resp);
    $body = json_decode(wp_remote_retrieve_body($resp), true);
    if ($code !== 200) {
        $msg = isset($body['error']['message']) ? $body['error']['message'] : ('Error de la API (' . $code . ')');
        wp_send_json_error($msg);
    }

    $text = '';
    if ($provider === 'openai') {
        $text = isset($body['choices'][0]['message']['content']) ? $body['choices'][0]['message']['content'] : '';
    } else {
        if (isset($body['content']) && is_array($body['content'])) {
            foreach ($body['content'] as $block) {
                if (isset($block['type']) && $block['type'] === 'text') $text .= $block['text'];
            }
        }
    }
    if (empty($text)) {
        wp_send_json_error('La IA no devolvió texto — revisa el modelo configurado o el estado de tu cuenta.');
    }

    set_transient($rate_key, $calls + 1, DAY_IN_SECONDS);
    wp_send_json_success(array('text' => $text, 'calls_left' => max(0, $limit - $calls - 1)));
}

