 Option Explicit
        Dim appRef
        Dim javaScriptFile
        Set appRef = CreateObject("Photoshop.Application")

        javaScriptFile = "C:\viditor\mockup\Start.jsx"
        call appRef.DoJavaScriptFile(javaScriptFile, Array("C:\viditor\mockup\json.json","three"))