const intervalInSeconds = 8; // Tempo de troca em segundos
let currentTabIndex = 0; // Índice da aba

// Função para alternar entre as abas
function switchTab() {
  chrome.tabs.query({}, (tabs) => {
    if (tabs.length === 0) {
      console.warn("Nenhuma aba encontrada.");
      return;
    }

    // Alternar para a próxima aba
    currentTabIndex = (currentTabIndex + 1) % tabs.length;
    chrome.tabs.update(tabs[currentTabIndex].id, { active: true }, () => {
      if (chrome.runtime.lastError) {
        console.error("Erro ao alternar aba:", chrome.runtime.lastError.message);
      } else {
        console.log(`Alternando para a aba: ${tabs[currentTabIndex].title}`);
      }
    });
  });
}

// Iniciar o intervalo de alternância
function startTabSwitcher() {
  setInterval(() => {
    console.log("Alternando abas...");
    switchTab();
  }, intervalInSeconds * 1000);
}

// Começar a alternância de abas assim que o script for carregado
startTabSwitcher();