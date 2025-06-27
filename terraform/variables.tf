variable "aws_region" {
  description = "Região da AWS"
  default     = "us-east-1"
}

variable "key_name" {
  description = "Nome da chave SSH"
  default     = "minha-chave-ssh"
}

variable "public_key_path" {
  description = "Caminho da chave pública"
  default     = "C:/Users/marco/.ssh/id_ed25519.pub"
}

variable "ami_id" {
  description = "AMI Ubuntu 22.04"
  default     = "ami-053b0d53c279acc90"
}

variable "instance_type" {
  description = "Tipo da instância EC2"
  default     = "t2.micro"
}

variable "api_port" {
  description = "Porta usada pela API"
  default     = 8000
}