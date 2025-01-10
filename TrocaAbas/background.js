// Função para salvar o índice da aba
function saveTabIndex(index) {
    chrome.storage.local.set({ currentTabIndex: index });
  }
  
  // Inicialização: quando a extensão é instalada ou o navegador é iniciado
  chrome.runtime.onInstalled.addListener(() => {
    console.log("Extensão instalada. Configurando índice inicial.");
    chrome.storage.local.set({ currentTabIndex: 0 });
  });
  
  chrome.runtime.onStartup.addListener(() => {
    console.log("Extensão iniciada. Configurando índice.");
  });