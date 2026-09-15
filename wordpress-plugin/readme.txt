=== YM Analytics Intelligence ===
Contributors: yelmartinez
Tags: seo, analytics, google analytics, search console, dashboard
Requires at least: 5.0
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 2.2.8
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Dashboard de SEO y marketing digital en WordPress: cruza datos de Google Analytics 4, Search Console y Screaming Frog para dar diagnóstico técnico y un plan de acción priorizado. Todo el procesamiento ocurre en el navegador — no hay servidor intermedio ni almacenamiento permanente de datos.

== Description ==

YM Analytics Intelligence convierte los exports que ya generas con tus herramientas habituales (Google Analytics 4, Search Console, Screaming Frog SEO Spider y el error_log de tu servidor) en un dashboard cruzado, con diagnóstico técnico automático y un plan de acción priorizado.

**Cómo funciona**

1. Prepara los archivos con la ayuda del checklist integrado (pantalla inicial → "¿Qué archivos tengo que preparar?").
2. Comprímelos todos juntos en un único .zip.
3. Suelta el .zip en la pantalla inicial del plugin.

El propio plugin descomprime y analiza el .zip en el navegador de quien lo usa — no se sube nada a ningún servidor, y los datos se borran al cerrar la pestaña.

**Funciones principales**

* Ingesta de un único ZIP con detección automática de contenido (no importa cómo se llamen los archivos ni en qué subcarpetas vayan) y deduplicación por versión/fecha.
* Motor de diagnóstico con más de 15 reglas: errores de servidor, presupuesto de rastreo, indexación, canibalización de contenido, oportunidades de CTR, conversión por canal y más.
* Cruce de Screaming Frog con Search Console y GA4 para detectar problemas que ninguna herramienta ve por separado.
* Panel de Cobertura de indexación, presupuesto de rastreo, canales, comportamiento, leads y seguimiento de keywords.
* Plan de acción priorizado con tareas marcables.
* Exportación a PDF con continuidad histórica entre sesiones.

**Uso**

Inserta el shortcode `[ym_analytics]` en cualquier entrada o página.

== Installation ==

1. Sube la carpeta `ym-analytics-intelligence` a `/wp-content/plugins/`, o instala el .zip directamente desde Plugins → Añadir nuevo → Subir plugin.
2. Activa el plugin desde el menú Plugins de WordPress.
3. Inserta el shortcode `[ym_analytics]` en cualquier entrada o página.

== Changelog ==

= 2.2.8 =
* Corregido: el panel "Salud del servidor (error_log)" de la pestana Rastreo tenia su PROPIA copia separada del aviso "[plugin] es responsable del X%", nunca tocada en el arreglo de la v2.2.4 (ese solo cubria el panel de Diagnostico) -- por eso el aviso de Elementor seguia igual pese a la anotacion. Aplicado el mismo arreglo aqui: cruza con las anotaciones de contexto operativo y ya no afirma "sigue activo" sin comprobarlo.
* Corregido: el chat de IA dejaba escribir y enviar un mensaje aunque no hubiera clave configurada, sin dar ningun aviso visible al pulsar enviar (el mensaje se quedaba escrito, sin pasar nada). Ahora el campo y el boton de enviar se deshabilitan claramente cuando falta la clave.
* Hecha mas flexible la deteccion del CSV de evolucion de indexacion (Cobertura) -- antes exigia una cadena de cabecera exacta y rigida; ahora reconoce variaciones razonables de redaccion/orden de columnas.
* Corregido: el grafico "Eventos clave por tipo" se quedaba completamente en blanco (sin grafico ni texto) cuando no había eventos de conversión que mostrar. Añadido mensaje explicando qué revisar. Tambien añadida una nota cuando "Leads por canal" muestra todos los canales a cero.

= 2.2.7 =
* Capturas mostraron que min-height:720px se quedaba justo al limite del contenido con gap:22px, activando el scroll interno de seguridad por un desbordamiento minimo. Subido min-height a 780px (mas margen) y reducido el gap de 22px a 18px, para no ir tan ajustado.

= 2.2.6 =
* Anadido enlace de descarga a la guia PDF completa ("Como preparar tu ZIP de datos") al pie del checklist interno del plugin.

= 2.2.5 =
* Corregida la causa real del problema de padding de la pantalla de inicio: #ym-analytics-root tenia min-height:640px fijo y overflow:hidden, y el splash va en position:absolute;inset:0 (encajado exactamente a esa altura, no puede empujarla a crecer). Con gap:22px activo, el contenido necesita mas alto de lo que caben esos 640px, asi que se recortaba o desbordaba de forma rara. Subido min-height a 720px para que quepa comodamente con el gap puesto, y anadido overflow-y:auto al splash como red de seguridad por si algun escenario todavia necesita mas espacio.

= 2.2.4 =
* Corregido: el hallazgo automatico "[plugin] es responsable del X% de tu error_log" ignoraba por completo las anotaciones de "Contexto operativo" del usuario, y recomendaba desinstalar el plugin directamente basandose solo en frecuencia de aparicion en el log — no en una causa confirmada. Ahora cruza el hallazgo con tus anotaciones (si mencionan el log/error y palabras de resolucion como "ya", "resuelto", "borré"), rebaja la severidad y muestra un aviso explicito de revisar tu propia nota antes de actuar. El texto de accion ya no sugiere desinstalar nunca de primeras — pide localizar el mensaje exacto y el post/ID implicado primero, porque un dato corrupto puede aparentar ser un fallo del plugin sin serlo.
* Corregidos 2 paneles que usaban 2 columnas (Top paginas y pantallas + grafico; Zona de impacto + curva CTR) cuya tabla es demasiado densa para media columna — auditados programaticamente los 24 paneles de 2 columnas del dashboard contra las tablas con columna "Que hacer"; solo estos dos estaban afectados, el resto ya funcionaba bien.

= 2.2.3 =
* Corregido: seguimiento de keywords (escribir + ⭐) no añadía nada. Causa real: todo el script va envuelto en un cierre (IIFE), así que las funciones llamadas desde onclick del HTML necesitan exponerse a window explicitamente — ymTrackKw, ymTrackKwDirect y ymUntrackKw se quedaron fuera de esa lista.
* Corregido el mismo problema en 5 funciones más encontradas en la misma revisión: ymAIToggle (abrir/cerrar el chat IA), ymAISend (enviar mensaje), ymAINewChat, ymAIPreview y ymHostGuide — es probable que esto explique por qué el asistente de IA seguía sin funcionar en versiones anteriores pese a los arreglos previos de modelo y CSS.
* Auditadas TODAS las funciones referenciadas desde cualquier atributo de evento inline (onclick, onchange, ondrop, etc.) contra la lista de funciones expuestas a window — no queda ninguna sin exponer.

= 2.2.2 =
* Ampliado el checklist "¿Qué archivos tengo que preparar?" para cubrir los 35 tipos de dataset y 6 diagramas visuales que el motor reconoce realmente (antes solo documentaba una fracción) — incluye ahora todos los exports de Bulk Export de Screaming Frog (accesibilidad, contenido duplicado, datos estructurados, directivas, canonicals, títulos, metas, H1, códigos de respuesta, PageSpeed), los 6 diagramas de Visualisations, los 3 CSV de Cobertura, las 6 tablas de Estadísticas de rastreo, y los 9 informes de GA4 reconocidos individualmente.

= 2.2.1 =
* Corregido: el botón flotante del chat IA (icono robot) no tenía centrado interno — el icono no quedaba centrado en el círculo. Ahora usa flex para centrarlo correctamente.
* Corregido: los botones de icono del chat (nueva conversación, cerrar) no tenían padding interno, dejando un área de clic del tamaño exacto del carácter. Añadido padding de 4px para un área de clic más cómoda.

= 2.2.0 =
* Corregido: la rejilla de dos columnas usaba media queries del navegador, que nunca saltaban dentro de columnas de contenido de WordPress más estrechas que la ventana — ahora usa container queries, que miden el ancho real del propio dashboard.
* Corregido: `enlaces_todo.csv` podía confundirse con el rastreo completo (`internos_todo.csv`) y pisar sus datos silenciosamente — detección reforzada.
* Corregido: el chatbot de IA llamaba a un modelo de Anthropic inexistente; actualizado a un modelo vigente. Además, el panel del chat ahora tiene un `max-height` defensivo para no quedar recortado de forma invisible por el contenedor.
* Nuevo: gráfico de Índice de Visibilidad (estilo Sistrix) en la pestaña Visibilidad, calculado a partir del histórico de keywords en seguimiento.
* Nuevo: comparativa de posición vs. lectura anterior en Seguimiento de KWs (subidas/bajadas por período).
* Nuevo: pestaña "Enlazado" — diagramas de rastreo y árbol de directorio de Screaming Frog embebidos directamente (antes se ignoraban al subir el ZIP), más detección de páginas huérfanas y mal enlazadas.
* Nuevo: pestaña "On-Page" — títulos, meta descriptions, H1, canonicals, contenido duplicado, datos estructurados (JSON-LD), accesibilidad (WCAG), códigos de respuesta del propio rastreo (3xx/4xx/5xx) y PageSpeed/Core Web Vitals por página.
* Nuevo: 9 tipos de dato adicionales reconocidos automáticamente desde los exports estándar de Screaming Frog.

= 2.1.0 =
* Nuevo: pantalla inicial con checklist de preparación de datos agrupado por herramienta (Screaming Frog, Search Console, GA4, servidor) y zona para arrastrar el ZIP ya preparado y empezar directamente.
* Nuevo: ingesta de ZIP completo en el navegador (JSZip) — detección automática por contenido, deduplicación por hash y por fecha cuando hay versiones repetidas del mismo export.
* Nuevo: panel de Cobertura de indexación (Search Console) con evolución temporal indexadas/sin-indexar y tabla de motivos críticos y no críticos.
* Nuevo: 4 reglas de diagnóstico — cruce Screaming Frog vs. GSC Coverage, cero eventos clave en todos los canales sin errores de servidor de por medio, presupuesto de rastreo en CSS/JS sin errores de servidor de por medio, tiempo de respuesta lento a Googlebot.
* Mejora: el hallazgo de CTR-gap (páginas en top 10 sin clics) se promueve a un hallazgo de primer nivel en el Plan de Acción, no solo visible en la tabla por URL.
* Corregido: el widget flotante del chat IA se salía del contenedor del dashboard (position:fixed → position:absolute).
* Corregido: los CSV no reconocidos se etiquetaban en silencio como datos válidos; ahora se ignoran explícitamente y se reportan como tal en el resumen de carga.

= 2.0 =
* Versión base: KPIs de GA4, gráficos de tendencia y canales, análisis SEO con Search Console, panel de leads, plan de acción, anotaciones de contexto y exportación a PDF.

== Frequently Asked Questions ==

= ¿Mis datos se suben a algún servidor? =

No. Todo el procesamiento — incluida la descompresión del ZIP — ocurre en el navegador de quien usa el dashboard. Los datos se guardan solo en memoria y se pierden al cerrar o recargar la pestaña.

= ¿Necesito subir cada archivo por separado? =

No. Puedes arrastrar un único .zip con todo dentro (subcarpetas incluidas) y el plugin detecta cada archivo por su contenido, no por su nombre.
