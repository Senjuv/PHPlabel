# PHPlabel

# Este sistema de inventario nos permite exportar datos en formato XLSX, tambien nos permite hacer impresiones de etiquetas segun el equipo deseado, tomando esto en un formato de PDF 

    #Caracteristicas 🔧
    - Impresion de etiquetas para dispositivos, por formato PDF.
    - Exportacion de equipos en formato XLSX.
    - Impresion de hojas responsivas para dispositivos en formato PDF.

    #Tecnologias ⚙️
  Las tecnologias utilizadas para el funcionamiento de este proyecto son:
    - Composer: Para la administracion de las librerias utilizadas.
    - Html2PDF-spipu: Esta libreria se utiliza para crear documentos PDF a partir de etiquetas HTML y un diseño CSS.
    - PhpSpreadsheet: Esta libreria nos permite crear hojas de  calculo.

En este proyecto se usa una configuracion PDO para las consultas, es de facil escalado y facil migracion a Mysqli, la base de datos utilizada para la ejecucion es Sqlite3.