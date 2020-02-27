{"version":3,"sources":["editor_panel.js"],"names":["BX","namespace","proxy","Landing","Utils","getSelectedElement","UI","Panel","EditorPanel","BaseButtonPanel","apply","this","arguments","layout","classList","add","position","currentElement","makeDraggable","registerBaseActions","appendToBody","rect","getBoundingClientRect","instance","getInstance","scrollHandler","target","onShow","node","onScroll","bind","document","addEventListener","onKeydown","window","passive","err","onHide","removeEventListener","event","which","nodeName","preventDefault","shiftKey","execCommand","metaKey","range","getSelection","getRangeAt","br","create","deleteContents","insertNode","createRange","setStartAfter","collapse","sel","removeAllRanges","addRange","setTimeout","adjustPosition","editor","dragButton","Button","EditorAction","html","attrs","title","Loc","getMessage","onbxdrag","onDrag","onbxdragstop","onDragEnd","jsDD","registerObject","prependButton","offsetCalculates","offsetLeft","offsetTop","x","y","pos","current_node","Math","max","abs","left","top","DOM","write","remove","style","addButton","onClick","adjustButtonsState","CreateLink","CreatePage","ColorAction","text","TextBackgroundAction","lastPosition","adjustAbsolutePosition","force","nodeRect","width","height","bodyContent","closest","bottom","innerHeight","pageYOffset","innerWidth","hideButtonsPopups","body","appendChild","mouseTarget","onMousedown","preventClick","onMouseUp","stopPropagation","closePopup","button","popup","close","menu","buttons","forEach","additionalButtons","Tool","ColorPicker","hideAll","prototype","constructor","__proto__","show","element","insertAfter","prevSibling","querySelector","isShown","onCustomEvent","call","hide","getAction","value","key","get","requestAnimationFrame","format","getFormat","bold","italic","underline","strike","align","getComputedStyle","getPropertyValue","includes","match","isFixed"],"mappings":"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","file":"editor_panel.map.js"}