# 📊 YM Analytics Intelligence

[![Version](https://img.shields.io/badge/version-2.2.8-blue)](https://github.com/yelmartinezseo/ym-analytics-intelligence)
[![License](https://img.shields.io/badge/license-GPLv2%20or%20later-green)](https://github.com/yelmartinezseo/ym-analytics-intelligence/blob/main/LICENSE)
[![WordPress](https://img.shields.io/badge/WordPress-Plugin-blue)](https://github.com/yelmartinezseo/ym-analytics-intelligence)
[![PHP](https://img.shields.io/badge/PHP-7.4%2B-777bb4)](https://github.com/yelmartinezseo/ym-analytics-intelligence)

Dashboard de SEO y marketing digital para WordPress: cruza datos de Google Analytics 4, Search Console, Screaming Frog SEO Spider y el `error_log` de tu servidor para dar un diagnóstico técnico cruzado y un plan de acción priorizado. Todo el procesamiento ocurre en el navegador de quien usa el dashboard — no hay servidor intermedio ni almacenamiento permanente de datos.

Versión web (sin instalación, sin panel de administración): [yel-martinez-portfolio.com/recursos/ym-analytics-intelligence](https://yel-martinez-portfolio.com/recursos/ym-analytics-intelligence/)

---

## ✨ Qué hace

- **Ingesta de un único ZIP** con detección automática de contenido (no importa cómo se llamen los archivos ni en qué subcarpetas vayan) y deduplicación por versión/fecha.
- **Motor de diagnóstico con más de 15 reglas**: errores de servidor, presupuesto de rastreo, indexación, canibalización de contenido, oportunidades de CTR, conversión por canal y más.
- **Cruce de Screaming Frog con Search Console y GA4** para detectar problemas que ninguna herramienta ve por separado.
- **Paneles**: Cobertura de indexación, presupuesto de rastreo, canales, comportamiento, leads y seguimiento de keywords.
- **Plan de acción priorizado** con tareas marcables.
- **Exportación a PDF** con continuidad histórica entre sesiones.
- **Asistente de IA opcional** (Anthropic Claude u OpenAI GPT) para interpretar el diagnóstico — requiere tu propia clave, configurada desde el panel de ajustes del plugin.

## 🔒 Privacidad

Todo el procesamiento —incluida la descompresión del ZIP— ocurre en el navegador de quien usa el dashboard. Los datos se guardan solo en memoria y se pierden al cerrar o recargar la pestaña. La única llamada de red saliente es la del asistente de IA opcional, server-side vía `admin-ajax.php`, y solo si se ha configurado una clave propia.

## 📦 Instalación

1. Descarga este repositorio o sube `wordpress-plugin/ym-analytics.php` a `/wp-content/plugins/ym-analytics-intelligence/`.
2. Activa el plugin desde el menú Plugins de WordPress.
3. Inserta el shortcode `[ym_analytics]` en cualquier entrada o página.
4. (Opcional) Ajustes → YM Analytics para configurar el asistente de IA.

## 🤖 Asistente de IA — cómo se guarda la clave

La clave se cifra en reposo (AES-256-CBC, derivada de `AUTH_KEY` de tu propio WordPress) antes de guardarse en `wp_options`, y nunca se expone al navegador — el proxy a Anthropic/OpenAI corre server-side. Es opcional: el resto del dashboard funciona igual sin ella.

## 📜 Changelog

Ver [`wordpress-plugin/readme.txt`](wordpress-plugin/readme.txt) (formato estándar WordPress.org) para el historial completo de versiones.

## 👤 Autoría

Desarrollado por [Yel Martínez](https://yel-martinez-portfolio.com/wikipedia-profesional/), Digital Strategist & Technologist. Parte de la [suite de herramientas ESG y SEO gratuitas](https://yel-martinez-portfolio.com/recursos/) que desarrolla para pymes e instituciones.

## Licencia

GPLv2 o posterior — ver [LICENSE](LICENSE).
