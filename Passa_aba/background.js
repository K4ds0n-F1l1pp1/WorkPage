const intervalInMinutes = 3;

function switchTab() {
  chrome.tabs.query({}, (tabs) => {
    if (tabs.length > 0) {

      chrome.storage.local.get(["currentTabIndex"], (result) => {
        let currentTabIndex = result.currentTabIndex || 0;

        currentTabIndex = (currentTabIndex + 1) % tabs.length;
        chrome.tabs.update(tabs[currentTabIndex].id, { active: true });

        chrome.storage.local.set({ currentTabIndex });
      });
    }
  });
}

chrome.runtime.onInstalled.addListener(() => {

  chrome.alarms.create("tabSwitcher", { periodInMinutes: intervalInMinutes });
  chrome.storage.local.set({ currentTabIndex: 0 }); // Inicializar o índice
});

chrome.alarms.onAlarm.addListener((alarm) => {
  if (alarm.name === "tabSwitcher") {
    switchTab();
  }
});

chrome.runtime.onStartup.addListener(() => {
  chrome.alarms.create("tabSwitcher", { periodInMinutes: intervalInMinutes });
});
