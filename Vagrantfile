# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  
  Vagrant.require_version ">= 1.4.3"


  config.vm.define :vmware do | vmware |
    
    vmware.vm.box = "box-cutter/ubuntu1404"
#  	vmware.vm.hostname = "vmware"

    # Create host-only adapter
    #vmware.vm.network "private_network", type: :dhcp

    # Create a private network
#    vmware.vm.network :private_network
    #, ip: "192.168.1.144"

    vmware.vm.synced_folder "./srv/", "/srv/", type: "nfs", nfs_export: false
   
    vmware.vm.network "public_network", bridge: 'en1: Wi-Fi (AirPort)'
#    vmware.ssh.forward_agent = true
    #config.ssh.username = "tripl3inf"

	config.vm.provider "vmware_fusion" do |vmware|
    vmware.gui = true
    #		vmware.vmx["memsize"] = "1024"
#		vmware.vmx["numvcpus"] = "1"

#    vmware.vmx["ethernet0.generatedAddress"] = nil
#    vmware.vmx["ethernet0.addressType"] = "static"
#    vmware.vmx["ethernet0.present"] = "TRUE"
#    vmware.vmx["ethernet0.connectionType"] = "nat"

    vmware.vmx["ethernet1.present"] = "TRUE"
    vmware.vmx["ethernet1.generatedAddress"] = nil
    vmware.vmx["ethernet1.connectionType"] = "bridged"
    vmware.vmx["ethernet1.addressType"] = "static"
		vmware.vmx["ethernet1.address"] = "5c:a1:ab:1e:00:02" #the MAC address
	end




  
  
  end
end

