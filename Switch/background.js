const intervalInSeconds = 8; // Intervalo em segundos
let currentTabIndex = 0;

// Alternar abas
function switchTab() {
  chrome.tabs.query({}, (tabs) => {
    if (tabs.length === 0) {
      console.warn("Nenhuma aba aberta.");
      return;
    }

    // Alternar para a próxima aba
    currentTabIndex = (currentTabIndex + 1) % tabs.length;
    chrome.tabs.update(tabs[currentTabIndex].id, { active: true }, () => {
      if (chrome.runtime.lastError) {
        console.error("Erro ao alternar aba:", chrome.runtime.lastError.message);
      } else {
        console.log(`Aba ativa: ${tabs[currentTabIndex].title}`);
      }
    });
  });
}

// Configurar o alarme para alternar abas
function setupAlarm() {
  console.log("Configurando alarme para alternância de abas.");
  chrome.alarms.create("switchTabAlarm", { periodInMinutes: intervalInSeconds / 60 });
}

// Listener para o alarme
chrome.alarms.onAlarm.addListener((alarm) => {
  if (alarm.name === "switchTabAlarm") {
    console.log("Alarme disparado: alternando abas.");
    switchTab();
  }
});

// Inicializar a extensão
chrome.runtime.onInstalled.addListener(() => {
  console.log("Extensão instalada. Iniciando alternador de abas.");
  setupAlarm();
});

chrome.runtime.onStartup.addListener(() => {
  console.log("Extensão iniciada com o navegador. Reconfigurando alarmes.");
  setupAlarm();
});