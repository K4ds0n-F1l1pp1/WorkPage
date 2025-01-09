let currentTabIndex = 0;

function switchTab() {
  chrome.tabs.query({}, (tabs) => {
    if (tabs.length > 0) {
      currentTabIndex = (currentTabIndex + 1) % tabs.length;
      chrome.tabs.update(tabs[currentTabIndex].id, { active: true });
    }
  });
}

setInterval(switchTab, 20000);